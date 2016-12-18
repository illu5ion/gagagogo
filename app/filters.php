<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
    if (Schema::hasTable('plugins')) {
        PluginManager::initialize();
    }

    App::setLocale(Session::get('lang', 'en'));
    Date::setLocale(Session::get('lang', 'en'));
    Lang::setLocale(Session::get('lang', 'en'));

    // If user is logged in via facebook, force name change.
    if (Auth::check()) {
        if (Auth::user()->usermail ===  Auth::user()->facebook_id) {
            if (Request::isMethod('get')) {
                View::share('settings', Settings::find(1));
                return View::make('home.facebook-name');
            }
        }
    }
});


App::after(function($request, $response)
{
    //
});

App::missing(function($exception)
{
    return Redirect::to('404');
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth_user', function()
{
    if ( (bool) Auth::check() === false)
        return Redirect::to('/')->with('triggerLoginModal', true);

    if( (int) Auth::user()->authority === 255)
        return Redirect::to('/');
});

Route::filter('auth_admin', function()
{
    if ( (bool) Auth::check() === false)
        return Redirect::to('/');

    if( ( (int) Auth::user()->authority === 255 ) || ( (int) Auth::user()->authority === 1 ) )
        return Redirect::to('/');
});

/*
|   Installation filters
|   Those routes are used for installer and updater functionality.
*/

Route::filter('installed', function() {

    if (!arwell_installed()) {
        return Redirect::to('installer');
    }

    // App successfully installed.
    View::share('settings', Settings::find(1));

});

Route::filter('not_installed', function() {

    if (arwell_installed()) {
        return Redirect::to('/');
    }

});

Route::filter('updateable', function() {

    $is_installed = File::get(storage_path() . '/installed.txt');
    if(trim($is_installed) !== "true") return Redirect::to('/');

});

/*
|   Authorisation filters
|   Those routes are used for authorisation.
*/

Route::filter('demo.disabled.user', function()
{
    if (App::environment() === 'demo')
    {
        return View::make('home.profile')
            ->nest('message_area', 'home.partials.alerts.info', array('message' => trans('app.disabled_demo_version')))
            ->with('comments', Comment::with('user')->where('user_id', (int) Auth::user()->id)->orderBy('id', 'DESC')->paginate(5));
    }
});

Route::filter('demo.disabled.admin', function()
{
    if (App::environment() === 'demo')
    {
        return View::make('theme-admin.partials.alerts.error-generic')
            ->with('message', trans('app.disabled_demo_version'));
    }
});

Route::filter('auth.basic', function()
{
    return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
    if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
    if (Session::token() !== Input::get('_token'))
    {
        throw new Illuminate\Session\TokenMismatchException;
    }
});