<?php

class InstallController extends BaseController {

	public function installer()
	{
		return View::make('installer.install')
			->with('message_area', null);
	}

	public function installProcess()
	{
		define('STDIN', fopen("php://stdin","r"));

		$input = Input::all(); Input::flash();

		$rules = array(
			'username'  => 'required|max:15|min:3|alpha_num',
			'password'  => 'required|max:15|min:6',
			'cpassword' => 'required|max:15|min:6|same:password',
			'usermail'  => 'required|min:2|max:60|email'
		);

		$validation = Validator::make($input, $rules);

		if($validation->fails())
			return View::make('installer.install')
				->nest('message_area', 'home.partials.alerts.error', array('message' => $validation->messages()->first()));

		// Run the installer
		Artisan::call('migrate', array('--force' => true));

		// Run the updater
		Artisan::call('migrate', array('--path' => '/app/database/updates', '--force' => true));

		// Seed
		Artisan::call('db:seed', array('--force' => true));

		// Change application key
		Artisan::call('key:generate');

		// Get our admin account
		$user = new User();
			$user->username  = $input['username'];
			$user->password  = Hash::make($input['password']);
			$user->usermail  = $input['usermail'];
			$user->authority = 0;
		$user->save();

		//Create an installed file so we can keep track of it.
		File::put(storage_path() . '/installed.txt', 'true');

		// All is well
		return View::make('installer.install-success');
	}

	public function update()
	{
		return View::make('installer.update')
			->with('message_area', null);
	}

	public function updateProcess()
	{
		Artisan::call('migrate', array('--path' => '/app/database/updates'));
		return View::make('installer.update-success');
	}
}
