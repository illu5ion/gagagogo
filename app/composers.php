<?php

/*
|--------------------------------------------------------------------------
| Composers
|--------------------------------------------------------------------------
|
| All composers
|
*/

	/*
	|	Theme settings
	*/
	View::composer(array('home.partials.loggedIn.nav', 'home.partials.loggedOut.nav', 'theme-admin.settings'), function($view) 
	{
		$themes = array('default', 'dark', 'earth', 'glacier', 'phoenix', 'violet', 'forest', 'orange', 'wall', 'sky');
		return $view->with('themes', $themes);
	});


	/*
	|	Login/logout Settings
	*/
	View::composer(array('home.layout'), function($view)
	{
		if( (bool) Auth::check() === true )
			return $view->nest('nav_login_partial', 'home.partials.loggedIn.nav');

		return $view->nest('nav_login_partial', 'home.partials.loggedOut.nav');
	});

	/*
	|	Render Comments area
	*/
	View::composer(array('home.gag-detail'), function($view)
	{
		// Identifier value comes from the second parameter of View make
		if( (bool) Auth::check() === true )
			return $view->nest('comment_area', 'home.partials.loggedIn.comment', array('identifier' => $view->identifier));

		return $view->nest('comment_area', 'home.partials.loggedOut.comment');
	});

	/*
	|	Widgets
	*/
	View::composer(array('home.partials.sidebar'), function($view)
	{
		return $view->with('widgets', Widget::all());
	});

	/*
	|	Pages
	*/
	View::composer(array('home.layout', 'home.partials.sidebar'), function($view)
	{
		return $view->with('pages', Page::all());
	});

	/*
	|	Binding categories into home, sub home and gag creation pages
	*/
	View::composer(array('home.layout', 'home.partials.sidebar', 'theme-admin.gag-add', 'home.partials.loggedIn.modals'), function($view) {
		return $view->with('categories', Category::all());
	});

	/*
	|	Featured gags
	*/
	View::composer(array('home.partials.sidebar'), function($view)
	{
		return $view->with('featured_gags', Gag::with('user')->where('is_featured', 1)->where('type', 'image')->take(15)->get());
	});

	/*
	|	Notifications area
	*/
	View::composer(array('home.layout'), function($view)
	{
		if( (bool) Auth::check() === true )
		{

			$notification_amount = Notification::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->count();
			$notifications       = Notification::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();

			return $view->nest('nav_notifications_partial', 'home.partials.loggedIn.notifications', 
				array('notification_amount' => $notification_amount, 'notifications' => $notifications)
			);
		}

		return $view->nest('nav_notifications_partial', 'home.partials.loggedOut.notifications');
	});

	/*
	|	Order types
	*/
	View::composer(array('home.layout'), function($view)
	{
		if(Request::segment(1) === 'top')
			return $view->with('orderType', 'top');

		if(Request::segment(1) === 'hot')
			return $view->with('orderType', 'hot');

		if(Request::segment(1) === 'trending')
			return $view->with('orderType', 'trending');

		return $view->with('orderType', 'fresh');

	});