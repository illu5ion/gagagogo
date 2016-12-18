<?php

class LoginController extends BaseController {

/*
|	Login
*/

	public function process()
	{
		if( ( (bool) Auth::check() === true) && ( (int) Auth::user()->authority === 0) )
			return Redirect::to('admin');

		if( ( (bool) Auth::check() === true) && ( (int) Auth::user()->authority === 1) )
			return Redirect::to('profile');

		if( ( (bool) Auth::check() === true) && ( (int) Auth::user()->authority === 255) ) 
			return Redirect::to('/');

		$input = Input::all();
		
		Auth::attempt(array('username' => $input['username'], 'password' => $input['password']));
		
		if( (bool) Auth::check() === false)
			return Response::json(array(
				'status' => 'error',
				'message' => trans('app.error_wrong_password')
			));

		if( (int) Auth::user()->authority === 255) {
			Auth::logout();
			return Response::json(array(
				'status' => 'error',
				'message' => trans('app.error_banned')
			));
		}

		//successful logon
		return Response::json(array(
			'status' => 'success',
			'message' => trans('app.success_logged_in')
		));
	}

/*
|	Register
*/

	public function registerProcess()
	{
		$input = Input::all(); Input::flash();

		$rules = array(
			'username'  => 'required|max:15|min:3|alpha_num|unique:userdata,username',
			'password'  => 'required|max:15|min:6',
			'email'  => 'required|min:2|max:60|email|unique:userdata,usermail'
		);

		$validation = Validator::make($input, $rules);

		if($validation->fails())
			return Response::json(array(
				'status' => 'error',
				'message' => $validation->messages()->first()
			));
		
		// Let's get our account.
		$user = new User(); 
			$user->username  = $input['username'];
			$user->password  = Hash::make($input['password']);
			$user->usermail  = $input['email'];
			$user->authority = 1;
		$user->save();

		Auth::attempt(array('username' => $input['username'], 'password' => $input['password']));

		if( !Auth::check() )
		{
			return Response::json(array(
				'status'  => 'error',
				'message' => trans('error.registered_but_could_not_login')
			));
		}
				
		//successfully registered and logged in
		return Response::json(array(
			'status' => 'success',
			'message' => trans('app.success_registered_and_logged_in')
		));
	}
}