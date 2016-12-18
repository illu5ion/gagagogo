<?php namespace Aristona\PluginManager\Facades;

use Illuminate\Support\Facades\Facade;

class PluginManager extends Facade {

	/**
	* Get the registered name of the component.
	*
	* @return string
	*/
	protected static function getFacadeAccessor()
	{
		return 'PluginManager';
	}

}