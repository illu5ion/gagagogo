<?php namespace Aristona\PluginManager;

use Illuminate\Support\ServiceProvider;

class PluginManagerServiceProvider extends ServiceProvider {

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
		$this->package('aristona/pluginmanager');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['PluginManager'] = $this->app->share(function($app)
		{
			return new PluginManager;
		});

		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('PluginManager', 'Aristona\PluginManager\Facades\PluginManager');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('PluginManager');
	}

}
