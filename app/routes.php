<?php

/*
|--------------------------------------------------------------------------
| Installer Route
|--------------------------------------------------------------------------
|
| This route is used by installer.
|
*/

Route::group(array('before' => 'not_installed'), function() {

	Route::get('installer', 'InstallController@installer');
	Route::post('installer/install', 'InstallController@installProcess');

});

Route::group(array('before' => 'updateable'), function() {

	Route::get('updater', 'InstallController@update');
	Route::get('updater/update', 'InstallController@updateProcess');

});

Route::group(array('before' => 'installed'), function() {

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Those routes belongs to oAuth.
|
*/


	Route::get('auth/provider/facebook', 'oAuthController@facebook');


/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
| Those routes belongs to ajax.
|
*/

	// Infinite scrolling
	Route::post('infinite', function() {

		$currentPage = Input::get('page');
		$type        = Input::get('type');
		$skipAmt     = 10; //Amount of gags shown on homepage on page load
		$skip        = (($currentPage * 5) + $skipAmt);

		if($type === 'fresh')
		{
			$view = View::make('home.infinite')
				->with('gags', Gag::with('user')->where('is_approved', 1)->orderBy('id', 'DESC')->skip($skip)->take(5)->get());
		}

		if($type === 'top')
		{
			$view = View::make('home.infinite')
				->with('gags', Gag::leftJoin(
					DB::raw('(SELECT gag_id, SUM(vote) AS votes FROM votes GROUP BY gag_id) as v'),
					'v.gag_id', '=', 'gags.id'
				)->orderBy('votes', 'desc')->skip($skip)->take(5)->get());
		}

		if($type === 'hot')
		{
			$view = View::make('home.infinite')
				->with('gags', Gag::leftJoin(
					DB::raw('(SELECT gag_id, SUM(vote) AS votes FROM votes GROUP BY gag_id) as v'),
					'v.gag_id', '=', 'gags.id'
				)->where('created_at', '>=', \Carbon\Carbon::now()->subMonth())->orderBy('votes', 'desc')->skip($skip)->take(5)->get());
		}

		if($type === 'trending')
		{
			$view = View::make('home.infinite')
				->with('gags', Gag::leftJoin(
					DB::raw('(SELECT gag_id, SUM(vote) AS votes FROM votes GROUP BY gag_id) as v'),
					'v.gag_id', '=', 'gags.id'
				)->where('created_at', '>=', \Carbon\Carbon::now()->subWeek())->orderBy('votes', 'desc')->skip($skip)->take(5)->get());
		}

		return $view->render();
	});

	// Get notifications
	Route::post('notifications', function() {

		if( (bool) Auth::check() === false )
			return;

		$notification_amount = Notification::where('user_id', Auth::user()->id)->where('seen', 0)->orderBy('id', 'DESC')->count();
		$notifications       = Notification::where('user_id', Auth::user()->id)->where('seen', 0)->orderBy('id', 'DESC')->get();

		// If there is nothing to show, return
		if($notifications->isEmpty())
			return;

		// Okay, make those notifications "seen"
		$update = Notification::where('user_id', Auth::user()->id)->where('seen', 0)->update(array('seen' => 1));

		// Show notifications now
		return View::make('home.partials.loggedIn.notifications-single')
			->with('notifications', $notifications);
	});

	// Trash notifications
	Route::post('notifications/trash', function() {

		if( (bool) Auth::check() === false )
			return;

		$toTrash = array();
		$toTrash = Input::get('notifications');

		if(count($toTrash) > 0)
		{
			Notification::where('user_id', Auth::user()->id)->whereIn('id', $toTrash)->delete();
			return trans('app.notification_successfully_trashed');
		}

		return; //Nothing to trash

	});


/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
|
| Those routes belongs to website.
|
*/

	// Homepage
	Route::get('/', 'HomeController@homepage'); //fresh
	Route::get('top', 'HomeController@homepageTop'); //top
	Route::get('hot', 'HomeController@homepageHot'); //hot
	Route::get('trending', 'HomeController@homepageTrending'); //trending

	//404
	Route::get('404', function() {
		return View::make('home.404');
	});

	//Banned
	Route::get('banned', function() {
		return View::make('home.banned');
	});

	// Language
	Route::get('language/turkish', 'LanguageController@toTurkish');
	Route::get('language/english', 'LanguageController@toEnglish');

	// Theme
	Route::get('/theme/{themeName}', 'ThemeController@theme');

	// Register
	Route::post('register', array('before' => 'csrf', 'uses' => 'LoginController@registerProcess'));

	// Login
	Route::post('login', array('before' => 'csrf', 'uses' => 'LoginController@process'));

	// Contact
	Route::get('contact', 'HomeController@contact');
	Route::post('contact', array('before' => 'csrf', 'uses' => 'HomeController@contactProcess'));

	// Static Pages
	Route::get('pages/{slug}', 'HomeController@pages');

	// Gag Pages
	Route::get('gag/{slug}/{id}', 'HomeController@gag');

	// Category Pages
	Route::get('category/{slug}', 'HomeController@category');

	// User Profile Pages
	Route::get('u/{username}', 'HomeController@user');

	// Logout
	Route::get('logout', function()
	{
		Auth::logout();
		return Redirect::to('/');
	});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Those routes belongs to people with User permission
|
*/

	Route::group(array('before' => 'auth_user', 'prefix' => 'profile'), function()
	{
		// Homepage
		Route::get('/', 'User\\UserController@account');
		Route::post('add-facebook-name', 'User\\UserController@addFacebookNameProcess');

		// Comments
		Route::group(array('prefix' => 'comment'), function() {

			Route::post('add', array('before' => 'csrf', 'uses' => 'User\\UserController@commentAddProcess'));
			Route::get('delete/{id}', array('before' => 'demo.disabled.user', 'uses' => 'User\\UserController@commentDeleteProcess'));

		});

		// Change password
		Route::post('password/update',
			array('before' => 'demo.disabled.user|csrf', 'uses' => 'User\\UserController@passwordUpdateProcess')
		);

		// Upload
		Route::group(array('prefix' => 'upload'), function() {

			Route::post('image',
				array('before' => 'csrf', 'uses' => 'User\\UserController@uploadImage')
			);

			Route::post('media',
				array('before' => 'csrf', 'uses' => 'User\\UserController@uploadMedia')
			);

		});

		// Vote
		Route::get('vote/{id}/{type}', 'User\\UserController@vote');

	});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Those routes belongs to people with Admin permission
|
*/

	Route::group(array('before' => 'auth_admin', 'prefix' => 'admin'), function()
	{

		// Homepage
		Route::get('/', function()
		{
			return View::make('theme-admin.homepage');
		});

		// Gag Management
		Route::group(array('prefix' => 'gag'), function() {

			Route::get('/', 'Admin\\GagController@index');
			Route::get('delete/{id}', array('before' => 'demo.disabled.admin', 'uses' => 'Admin\\GagController@delete'));

			Route::get('feature/{id}','Admin\\GagController@feature');
			Route::post('feature', array('before' => 'demo.disabled.admin', 'uses' => 'Admin\\GagController@featureProcess'));

			Route::get('approve/{id}', array('before' => 'demo.disabled.admin', 'uses' => 'Admin\\GagController@approve'));
			Route::get('disapprove/{id}', array('before' => 'demo.disabled.admin', 'uses' => 'Admin\\GagController@disapprove'));

			Route::get('unfeature/{id}', array('before' => 'demo.disabled.admin', 'uses' => 'Admin\\GagController@unfeature'));

		});

		// Category Management
		Route::group(array('prefix' => 'category'), function() {

			Route::get('/', 'Admin\\CategoryController@index');

			Route::get('add', 'Admin\\CategoryController@add');
			Route::post('add', array('before' => 'demo.disabled.admin|csrf', 'uses' => 'Admin\\CategoryController@addProcess'));

			Route::get('modify/{id}', 'Admin\\CategoryController@modify');
			Route::post('modify/{id}', array('before' => 'demo.disabled.admin|csrf', 'uses' => 'Admin\\CategoryController@modifyProcess'));

			Route::get('delete/{id}', array('before' => 'demo.disabled.admin', 'uses' => 'Admin\\CategoryController@delete'));

		});

		// Contact Management */
		Route::group(array('prefix' => 'contact'), function() {

			Route::get('/', 'Admin\\ContactController@index');
			Route::get('delete/{id}','Admin\\ContactController@delete');

		});


		// Page Management
		Route::group(array('prefix' => 'page'), function() {

			Route::get('/', 'Admin\\PageController@index');

			Route::get('add', 'Admin\\PageController@add');
			Route::post('add', array('before' => 'demo.disabled.admin|csrf', 'uses' => 'Admin\\PageController@addProcess'));

			Route::get('delete/{id}', array('before' => 'demo.disabled.admin', 'uses' => 'Admin\\PageController@delete'));

		});

		// Setting Management
		Route::group(array('prefix' => 'setting'), function() {

			Route::get('/', 'Admin\\SettingController@index');
			Route::post('/', array('before' => 'demo.disabled.admin|csrf', 'uses' => 'Admin\\SettingController@process'));

		});

		// User Management
		Route::group(array('prefix' => 'user'), function() {

			Route::get('/', 'Admin\\UserController@index');

			Route::get('add', 'Admin\\UserController@add');
			Route::post('add', array('before' => 'demo.disabled.admin|csrf', 'uses' => 'Admin\\UserController@addProcess'));

			Route::get('ban/{id}', array('before' => 'demo.disabled.admin', 'uses' => 'Admin\\UserController@ban'));
			Route::get('unban/{id}', array('before' => 'demo.disabled.admin', 'uses' => 'Admin\\UserController@unban'));

		});

		// Widget Management
		Route::group(array('prefix' => 'widget'), function() {

			Route::get('/', 'Admin\\WidgetController@index');

			Route::get('addstring', 'Admin\\WidgetController@addString');
			Route::post('addstring', array('before' => 'demo.disabled.admin|csrf', 'uses' => 'Admin\\WidgetController@addStringProcess'));

			Route::get('addupload', 'Admin\\WidgetController@addUpload');
			Route::post('addupload', array('before' => 'demo.disabled.admin|csrf', 'uses' => 'Admin\\WidgetController@addUploadProcess'));

			Route::get('delete/{id}', array('before' => 'demo.disabled.admin', 'uses' => 'Admin\\WidgetController@delete'));

		});

		// Comment Management */
		Route::group(array('prefix' => 'comment'), function() {

			Route::get('/', 'Admin\\CommentController@index');

			Route::get('massapprove','Admin\\CommentController@massApprove');
			Route::get('approve/{id}','Admin\\CommentController@approve');
			Route::get('disapprove/{id}','Admin\\CommentController@disapprove');

			Route::get('delete/{id}', array('before' => 'demo.disabled.admin', 'uses' => 'Admin\\CommentController@delete'));

		});

		// Plugin Management */
		Route::group(array('prefix' => 'plugin-manager'), function() {

			Route::get('install/{folder}', 'Admin\\PluginManagerController@install');
			Route::get('uninstall/{folder}', 'Admin\\PluginManagerController@uninstall');

		});
	});
});
