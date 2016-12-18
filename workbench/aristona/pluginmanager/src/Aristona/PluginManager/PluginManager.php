<?php namespace Aristona\PluginManager;

class PluginManager
{

	protected $loaded = array();
	protected $activated = array();

	protected $initialized = false;

	public function __construct()
	{
	}

	public function initialize()
	{
		$plugin_folders    = array_map('basename', \File::directories(base_path() . '/workbench/aristona/'));

		$activated_plugins = \Plugin::all();
		$activated_plugins = $activated_plugins->map(function ($entry) {
			return $entry->name;
		})->toArray();

		// If plugin manager is on the list, remove it.
		if (($key = array_search('pluginmanager', $plugin_folders)) !== false) {
			unset($plugin_folders[$key]);
		}

		$plugin_folders = array_values($plugin_folders);

		// Add the normalized names as keys to array.
		foreach ($plugin_folders as $folder) {

			$this->loaded[$this->getPluginNameByFolder($folder)] = $folder;

		}

		// Iterate though each loaded plugin.
		foreach ($this->loaded as $key => $value) {

			\Log::debug($key . " is loaded.");

			// If they're active...
			if (in_array($key, $activated_plugins)) {

				\Log::debug($key . " is activated.");

				// Then set their registrars.
				\App::register('Aristona\\' . $key . '\\PluginServiceProvider');
				$this->activated[$key] = \App::make($key);
			}

		}

		$this->initialized = true;
	}

	public function getPluginNameByFolder($folder)
	{
		switch($folder)
		{
			case 'memegenerator':
				return 'MemeGenerator';
				break;

			case 'sidebarenhancements':
				return 'SidebarEnhancements';
				break;
		}
	}

	public function activated($name)
	{
		return isset($this->activated[$name]);
	}

	public function loaded($name)
	{
		return array_key_exists($name, $this->loaded);
	}

	public function get($name)
	{
		return $this->activated[$name];
	}

	public function getByFolder($folder)
	{
		dd($this->activated);
	}

	public function getLoadedPluginNames()
	{
		return $this->loaded;
	}

	public function getActivatedPluginNames()
	{
		return $this->activated;
	}
}
