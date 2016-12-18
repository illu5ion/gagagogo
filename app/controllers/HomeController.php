<?php

class HomeController extends BaseController {

	/*
	|	Fresh: Load gags in order according to the dates posted.
	*/
	public function homepage()
	{
		return View::make('home.homepage')
			->with('gags', Gag::with('user')->where('is_approved', 1)->orderBy('id', 'DESC')->take(10)->get());
	}

	/*
	|	Top: Load gags in order according to positive vote overall (all gags)
	*/
	public function homepageTop()
	{
		$gags = Gag::leftJoin(
			DB::raw('(SELECT gag_id, SUM(vote) AS votes FROM votes GROUP BY gag_id) as v'),
			'v.gag_id', '=', 'gags.id'
		)->orderBy('votes', 'desc')->take(10)->get();

		return View::make('home.homepage')
			->with('gags', $gags);
	}

	/*
	|	Hot: Load gags in order according to positive vote overall (last month)
	*/
	public function homepageHot()
	{
		$gags = Gag::leftJoin(
			DB::raw('(SELECT gag_id, SUM(vote) AS votes FROM votes GROUP BY gag_id) as v'),
			'v.gag_id', '=', 'gags.id'
		)->where('created_at', '>=', \Carbon\Carbon::now()->subMonth())->orderBy('votes', 'desc')->take(10)->get();

		return View::make('home.homepage')
			->with('gags', $gags);
	}

	/*
	|	Trending: Load gags in order according to positive vote overall (last week)
	*/
	public function homepageTrending()
	{
		$gags = Gag::leftJoin(
			DB::raw('(SELECT gag_id, SUM(vote) AS votes FROM votes GROUP BY gag_id) as v'),
			'v.gag_id', '=', 'gags.id'
		)->where('created_at', '>=', \Carbon\Carbon::now()->subWeek())->orderBy('votes', 'desc')->take(10)->get();

		return View::make('home.homepage')
			->with('gags', $gags);
	}

	public function gag($slug, $id)
	{
		$gags = Gag::with('user')->where('id', $id)->first();

		// If no entry is found, back to homepage.
		if($gags === null) return Redirect::to('/');

		// Before showing user the gag, let's increase it's readcount by 1
		$gags->read_count = $gags->read_count + 1;
		$gags->save();

		// Everything looks good!
		return View::make('home.gag-detail', array('identifier' => $gags->id)) //Identifier for composer
			->with('message_area', null)
			->with('gag_detail', $gags)
			->with('comments', Comment::with('user')->where('on', (int) $gags->id)->where('is_approved', 1)->orderBy('id', 'DESC')->take(10)->get());
	}

	public function category($slug)
	{
		$cat = Category::where('slug', $slug)->first();

		// If no entry is found, back to homepage.
		if($cat === null) return Redirect::to('/');

		// Get gags in this category
		$gags = Gag::with('user')->where('belongs_to', $cat->id)->where('is_approved', 1)->orderBy('id', 'DESC')->paginate(10);

		// If category is empty, show the empty page.
		if($gags->isEmpty())
			return View::make('home.category-empty')
				->with('category_name', $cat->category_name)
				->nest('message_area', 'home.partials.alerts.error', array('message' => trans('app.category_empty')));

		return View::make('home.category')
			->with('category_name', $cat->category_name)
			->with('gags', $gags);
	}

	public function contact()
	{
		return View::make('home.contact')
			->with('message_area', null);
	}

	public function contactProcess()
	{
		$input = Input::all(); Input::flash();

		$rules = array( 
			'name'    => 'required|max:50|min:3',
			'email'   => 'required|email|max:60',
			'message' => 'required|max:2000|min:3'
		);

		$validation = Validator::make($input, $rules);

		if($validation->fails())
			return View::make('home.contact')
				->nest('message_area', 'home.partials.alerts.error', array('message' => $validation->messages()->first()));
		
		
		$contact = new Contact(); 
			$contact->name    = $input['name'];
			$contact->email   = $input['email'];
			$contact->message = $input['message'];
		$contact->save();
		
		return View::make('home.contact')
			->nest('message_area', 'home.partials.alerts.success', array('message' => trans('app.success_message_sent')));
	}

	public function pages($slug)
	{
		$page = Page::where('slug', $slug)->first();

		if($page === null) return Redirect::to('/');

		return View::make('home.static')
			->with('page', $page);
	}

	public function user($username)
	{
		$user = User::where('username', $username)->first();

		// User is not found, so we redirect back.
		if(!$user) return Redirect::to('/');

		// Take the amount of votes on this user's sharings.
		$gags = array();
		$gags_by_user = Gag::where('user_id', $user->id)->get(array('id'));
		foreach($gags_by_user as $k => $v)
		{
			$gags[] = $v->id;
		}

		if(count($gags) > 0)
			$votes_taken = Vote::whereIn('gag_id', $gags)->count();
		else
			$votes_taken = 0;

		// Take user's comments and paginate them.
		$comments = Comment::where('user_id', $user->id)->where('is_approved', 1)->orderBy('id', 'DESC')->paginate(5);

		// Take the amount of user's votes
		$votes_given = Vote::where('user_id', $user->id)->count();

		// Take the user's amount of sharings.
		$shares = Gag::where('user_id', $user->id)->count();

		return View::make('home.user')
			->with('user', $user)
			->with('comments', $comments)
			->with('votes_taken', $votes_taken)
			->with('votes_given', $votes_given)
			->with('shares', $shares);
	}
}