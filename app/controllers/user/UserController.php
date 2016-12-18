<?php namespace User;

use BaseController;
use View;
use Category;
use Input;
use Validator;
use Comment;
use Auth;
use Str;
use Response;
use Gag;
use Settings;
use Image;
use Htmldom;
use Redirect;
use User;
use Hash;
use Notification;
use Session;

class UserController extends BaseController 
{

	public function addFacebookNameProcess()
	{
		$input = \Input::all();
		$rules = array(
			'username' => 'required|max:15|min:3|alpha_num|unique:userdata,username',
			'email'    => 'required|min:2|max:60|email|unique:userdata,usermail'
		);

		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			return \Redirect::back()->with([
				'type' => 'error',
				'message' => $validation->messages()->first()
			]);
		}

		$user = \User::where('username', Auth::user()->username)->first();
			$user->username = $input['username'];
			$user->usermail = $input['email'];
		$user->save();

		return \Redirect::to('/');
	}

	public function account()
	{
		return View::make('home.profile')
			->with('message_area', null)
			->with('comments', Comment::with('user')->where('user_id', (int) Auth::user()->id)->orderBy('id', 'DESC')->paginate(5));
	}

	public function passwordUpdateProcess()
	{
		$input = Input::all(); Input::flash();

		$rules = array( 
			'password'  => 'required|max:15|min:6',
			'cpassword' => 'required|max:15|min:6|same:password'
		);

		$validation = Validator::make($input, $rules);

		if($validation->fails())
			return View::make('home.profile')
				->nest('message_area', 'home.partials.alerts.error', array('message' => $validation->messages()->first()))
				->with('comments', Comment::with('user')->where('user_id', (int) Auth::user()->id)->orderBy('id', 'DESC')->paginate(5));
		
		$user = User::find( (int) Auth::user()->id);
			$user->password = Hash::make($input['password']);
		$user->save();

		return View::make('home.profile')
			->nest('message_area', 'home.partials.alerts.success', array('message' => trans('app.success_password_changed')))
			->with('comments', Comment::with('user')->where('user_id', (int) Auth::user()->id)->orderBy('id', 'DESC')->paginate(5));
	}

	public function commentAddProcess()
	{
		$input = Input::all(); Input::flash();

		$rules = array( 
			'identifier'		=> 'required|integer|exists:gags,id',
			'comment'           => 'required|min:3|max:500'
		);

		$validation = Validator::make($input, $rules);

		if($validation->fails())
			return Redirect::back()
				->with('type', 'danger')
				->with('message', $validation->messages()->first());

		// Add a comment cooldown.
		$cooldown = Session::get('comment_cooldown', 0);

		if($cooldown >= time())
			return Redirect::back()
				->with('type', 'danger')
				->with('message', trans('app.error_comment_cooldown'));

		// Add the cooldown now.
		Session::put('comment_cooldown', time() + 10);

		/*
		|	Notify user
		*/
		$gag_owner = Gag::where('id', $input['identifier'])->first();
		if($gag_owner)
		{
			$notification = new Notification();
				$notification->user_id     = $gag_owner->user_id;
				$notification->target_user = Auth::user()->id;
				$notification->type        = 'comment';
				$notification->url         = $input['identifier'];
				$notification->message     = 0;
				$notification->seen        = 0;
			$notification->save();
		}
		
		/*
		|	If autoapprove is set to disabled, save the comment but
		|	show users the warning message.
		*/
		if( (int) Settings::first()->autoapprove_comments === 0)
		{
			$comment = new Comment(); 
				$comment->user_id     = (int) Auth::user()->id;
				$comment->message     = $input['comment'];
				$comment->on          = (int) $input['identifier'];
				$comment->is_approved = (int) 0;
			$comment->save();

			return Redirect::back()
				->with('type', 'info')
				->with('message', trans('app.success_comment_awaits_admin_approval'));
		}

		/*
		|	Otherwise, save the comment and make is_approved 1
		*/
		$comment = new Comment(); 
			$comment->user_id     = (int) Auth::user()->id;
			$comment->message     = $input['comment'];
			$comment->on          = (int) $input['identifier'];
			$comment->is_approved = (int) 1;
		$comment->save();

		return Redirect::back()
			->with('type', 'success')
			->with('message', trans('app.success_comment_auto_approved'));
	}

	public function commentDeleteProcess($id)
	{
		$id = (int) $id;
		
		$status = Comment::where('id', $id)->where('user_id', Auth::user()->id)->delete();

		if ( (int) $status === 0)
		{
			return View::make('home.profile')
				->nest('message_area', 'home.partials.alerts.error', array('message' => trans('app.error_could_not_delete_comment')))
				->with('comments', Comment::with('user')->where('user_id', (int) Auth::user()->id)->orderBy('id', 'DESC')->paginate(5));
		}

		return View::make('home.profile')
			->nest('message_area', 'home.partials.alerts.success', array('message' => trans('app.success_comment_deleted')))
			->with('comments', Comment::with('user')->where('user_id', (int) Auth::user()->id)->orderBy('id', 'DESC')->paginate(5));
	}

	public function vote($id, $type)
	{
		$gag_id = (int) $id;

		// Type is correct? It should be up or down.
		if(!in_array($type, array('up', 'down')))
			return Response::json(array(
				'status'  => 'error',
				'message' => 'Unrecognised param.'
			));

		// Does gag really exists in database?
		if( !Gag::find($id) )
			return Response::json(array(
				'status'  => 'error',
				'message' => 'Invalid gag'
			));

		// Did user previously voted this gag?
		if( (int) \Vote::where('user_id', Auth::user()->id)->where('gag_id', $gag_id)->count() === 1)
		{
			// Let's change his vote.
			$vote = \Vote::where('user_id', Auth::user()->id)->where('gag_id', $gag_id)->first();
				$vote->vote = ($type === 'up') ? 1 : -1;
			$vote->save();
		}
		else
		{
			// Ok, let's add his new vote to database.
			$vote = new \Vote();
				$vote->user_id = Auth::user()->id;
				$vote->gag_id = $gag_id;
				$vote->vote = ($type === 'up') ? 1 : -1;
			$vote->save();

			// Also, notify the gag owner.
			$gag_owner = Gag::where('id', $gag_id)->first();
			if($gag_owner)
			{
				$notification = new Notification();
					$notification->user_id     = $gag_owner->user_id;
					$notification->target_user = Auth::user()->id;
					$notification->type        = 'vote';
					$notification->url         = $gag_id;
					$notification->message     = 0;
					$notification->seen        = 0;
				$notification->save();
			}
		}

		return Response::json(array(
			'status'  => 'success',
			'message' => 'Vote (' . $type . ') successful'
		));
	}

	public function uploadImage()
	{

		$input = Input::all();

		$rules = array(
			'upload_title' => 'required|max:75|min:3',
			'belongs_to'   => 'required|integer|exists:categories,id',
			'image'        => 'required|image|max:2000',
			'credits'      => 'max:500'
		);

		$validation = Validator::make($input, $rules);

		if($validation->fails())
			return Response::json(array(
				'status'  => 'error',
				'message' => $validation->messages()->first()
			));

		// Generate a random name
		$randomName = Str::random(10);

		// Get the extension
		$extension = Input::file('image')->getClientOriginalExtension();

		if($extension === "jpg" || $extension === "png")
		{
			// Move it to uploads folder and convert it to PNG
			Input::file('image')->move(public_path() . '/assets/public/uploads/', $randomName . '.png');

			// Get the image
			$img = Image::make(public_path() . '/assets/public/uploads/' . $randomName . '.png');

			// Add watermark to the same image if is 1 on settings->auto_add_watermark
			if( (int) Settings::first()->auto_add_watermark === 1)
			{
				$img->insert(public_path() . '/assets/public/uploads/' . Settings::first()->watermark);
			}

			$img->resize(400, null, function ($constraint) {
				$constraint->aspectRatio();
			});
			$img->save();

			$gag = new Gag();
				$gag->title       = $input['upload_title'];
				$gag->slug        = Str::slug($input['upload_title']);
				$gag->belongs_to  = $input['belongs_to'];
				$gag->credits     = strlen($input['credits']) > 0 ? $input['credits'] : '';
				$gag->gag_url     = $randomName;
				$gag->type        = 'image';
				$gag->user_id     = Auth::user()->id;
				$gag->read_count  = 0;

				if(\App::environment() === 'demo')
				{
					$gag->is_approved = 0;
				}
				else
				{
					$gag->is_approved = ((int) Settings::first()->autoapprove_gags === 0) ? 0 : 1;
				}

				$gag->is_featured = 0;
			$gag->save();

			return Response::json(array(
				'status'      => 'success',
				'message'     => trans('app.upload_success'),
				'redirect_to' => $gag->endpoint()
			));
		}
		else
		{
			// Move it to uploads folder and keep it as GIF.
			Input::file('image')->move(public_path() . '/assets/public/uploads/', $randomName . '.gif');

			$attempt = $this->convertToPng($randomName);

			if(!$attempt)
				return Response::json(array(
					'status'  => 'error',
					'message' => trans('app.error_convert_exception')
			));

			$gag = new Gag();
				$gag->title       = $input['upload_title'];
				$gag->slug        = Str::slug($input['upload_title']);
				$gag->belongs_to  = $input['belongs_to'];
				$gag->credits     = strlen($input['credits']) > 0 ? $input['credits'] : '';
				$gag->gag_url     = $randomName;
				$gag->type        = 'gif';
				$gag->user_id     = Auth::user()->id;
				$gag->read_count  = 0;
				if(\App::environment() === 'demo')
				{
					$gag->is_approved = 0;
				}
				else
				{
					$gag->is_approved = ((int) Settings::first()->autoapprove_gags === 0) ? 0 : 1;
				}
				$gag->is_featured = 0;
			$gag->save();

			return Response::json(array(
				'status'      => 'success',
				'message'     => trans('app.upload_success'),
				'redirect_to' => $gag->endpoint()
			));
		}
	}

	public function uploadMedia()
	{
		$input = Input::all();

		$rules = array(
			'upload_title' => 'required|max:75|min:3',
			'belongs_to'   => 'required|integer|exists:categories,id',
			'url'          => 'required|min:3|max:100'
		);

		$validation = Validator::make($input, $rules);

		if($validation->fails())
			return Response::json(array(
				'status'  => 'error',
				'message' => $validation->messages()->first()
			));

		$attempt = $this->convertUrlToEmbed($input['url']);

		if($attempt === false)
			return Response::json(array(
				'status'  => 'error',
				'message' => trans('app.error_not_a_valid_url')
		));

		if($attempt[0] === 'vine')
		{
			// We need to make sure we get vine image to put it as a placeholder.
			// Take it
			$image = $this->getVineImageByVineID($attempt[1]);

			// Could we get image of the vine?
			if(!$image)
				return Response::json(array(
					'status'  => 'error',
					'message' => trans('app.error_vine_image_not_obtained')
			));

			// Convert gag_url into JSON, keep both image and the id.
			$json = json_encode(array('id' => $attempt[1], 'image' => $image));

			$gag = new Gag();
				$gag->title       = $input['upload_title'];
				$gag->slug        = Str::slug($input['upload_title']);
				$gag->belongs_to  = $input['belongs_to'];
				$gag->gag_url     = $json;
				$gag->type        = $attempt[0];
				$gag->user_id     = Auth::user()->id;
				$gag->read_count  = 0;
				if(\App::environment() === 'demo') {
					$gag->is_approved = 0;
				}
				else {
					$gag->is_approved = ((int) Settings::first()->autoapprove_gags === 0) ? 0 : 1;
				}
				$gag->is_featured = 0;
			$gag->save();
		}
		else
		{
			// Handle youtube and vimeo videos.
			$gag = new Gag();
				$gag->title       = $input['upload_title'];
				$gag->slug        = Str::slug($input['upload_title']);
				$gag->belongs_to  = $input['belongs_to'];
				$gag->gag_url     = $attempt[1];
				$gag->type        = $attempt[0];
				$gag->user_id     = Auth::user()->id;
				$gag->read_count  = 0;
				if(\App::environment() === 'demo') {
					$gag->is_approved = 0;
				}
				else {
					$gag->is_approved = ((int) Settings::first()->autoapprove_gags === 0) ? 0 : 1;
				}
				$gag->is_featured = 0;
			$gag->save();
		}

		return Response::json(array(
			'status'      => 'success',
			'message'     => trans('app.upload_success'),
			'redirect_to' => $gag->endpoint()
		));
	}

	protected function convertUrlToEmbed($url)
	{
		//Get rid of http or https protocols.
		if(substr($url, 7) === "http://") $url = substr($url, 7);
		if(substr($url, 8) === "https://") $url = substr($url, 8);

		//Get the type (e.g youtube)
		$type = null;
		if (strpos($url, 'youtube.com/') !== false)
			$type = 'youtube';

		if (strpos($url, 'vimeo.com/') !== false)
			$type = 'vimeo';

		if (strpos($url, 'vine.co/') !== false)
			$type = 'vine';

		switch($type) {
			case "youtube":
				return $this->handleYoutube($url, $type);
				break;

			case "vimeo":
				return $this->handleVimeo($url, $type);
				break;

			case "vine":
				return $this->handleVine($url, $type);
				break;
			
			default:
				return false;
		}
	}

	protected function handleYoutube($url, $type)
	{
		$position = strpos($url, 'watch?v=');
		$extracted = substr($url, ($position + (strlen('watch?v='))), 11);

		return array($type, $extracted);
	}

	protected function handleVimeo($url, $type)
	{
		$position = strpos($url, '.com/');
		$extracted = substr($url, ($position + (strlen('.com/'))));

		return array($type, $extracted);
	}

	protected function handleVine($url, $type)
	{
		$position = strpos($url, '/v/');
		$extracted = substr($url, ($position + (strlen('/v/'))));

		return array($type, $extracted);
	}

	/*
	|	Takes image url of the given vine ID
	*/
	protected function getVineImageByVineID($id)
	{
		$html = new Htmldom("http://vine.co/v/{$id}");	
		preg_match('/property="twitter:image" content="(.*?)"/', $html, $matches);
		return (isset($matches[1])) ? $matches[1] : false;
	}

	protected function convertToPng($randomName)
	{
		// Attempt to open
		$im = imagecreatefromgif(public_path() . '/assets/public/uploads/' . $randomName . '.gif');

		// See if it failed
		if(!$im)
			return false;

		$image = imagepng($im, public_path() . '/assets/public/uploads/gif_prefix_' . $randomName . '.png', 0);
		if(!$image)
			return false;

		imagedestroy($im);
		return true;
	}
}


