<?php namespace Aristona\SidebarEnhancements;

use Illuminate\Support\ServiceProvider;

class PluginServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('aristona/sidebarenhancements');

		\View::addNamespace('sidebarenhancements', __DIR__.'/../../views');

		require_once __DIR__.'/../../routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['SidebarEnhancements'] = $this->app->share(function($app)
		{
			return new Plugin;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('SidebarEnhancements');
	}

}
