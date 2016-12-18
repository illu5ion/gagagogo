<?php namespace Admin;

use BaseController;
use View;
use User;
use Input;
use Validator;
use Hash;

class UserController extends BaseController
{
	public function index()
	{
		return View::make('theme-admin.user')
			->with('users', User::all());
	}

	public function add()
	{
		return View::make('theme-admin.user-add')
			->with('message_area', null);
	}

	public function addProcess()
	{
		$input = Input::all(); Input::flash();

		$rules = array(
			'username' => 'required|max:15|min:3|alpha_num|unique:userdata,username',
			'password' => 'required|max:15|min:6',
			'usermail' => 'required|min:2|max:60|email|unique:userdata,usermail',
			'authority' => 'required|in:0,1,255'
		);

		$validation = Validator::make($input, $rules);

		if($validation->fails())
			return View::make('theme-admin.user-add')
				->nest('message_area', 'theme-admin.partials.alerts.error', array('message' => $validation->messages()->first()));
		
		$user = new User(); 
			$user->username  = $input['username'];
			$user->password  = Hash::make($input['password']);
			$user->usermail  = $input['usermail'];
			$user->authority = (int) $input['authority'];
		$user->save();
				
		return View::make('theme-admin.user-add')
			->nest('message_area', 'theme-admin.partials.alerts.success', array('message' => trans('admin.user_add_success')));
	}

	public function ban($id)
	{
		$id = (int) $id;
		/* 
		| If we are banning an administrator, make sure there is 
		| at least one administrator left on the system. 
		*/
		
		$auth = User::find($id)->authority;

		if( (int) $auth === 0)
		{
			$count = User::where('authority', 0)->count();

			if( (int) $count === 1)
			{
				return View::make('theme-admin.partials.alerts.error-generic')
					->with('message', trans('admin.user_delete_fail_only_admin'));
			}
		}

		// All is well
		$user = User::find($id);
			$user->authority = (int) 255; //bye
		$user->save();

		return self::index();
	}

	public function unban($id)
	{
		$id = (int) $id;
		$user = User::find($id);
			$user->authority = (int) 1;
		$user->save();
		
		return self::index();
	}
}