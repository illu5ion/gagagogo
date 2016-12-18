<?php

class ThemeController extends BaseController {

	public function theme($themeName)
	{
		switch($themeName) {
			case 'default':
				Session::put('theme', 'default');
				break;

			case 'earth':
				Session::put('theme', 'earth');
				break;

			case 'phoenix':
				Session::put('theme', 'phoenix');
				break;

			case 'glacier':
				Session::put('theme', 'glacier');
				break;

			case 'dark':
				Session::put('theme', 'dark');
				break;

			case 'violet':
				Session::put('theme', 'violet');
				break;

			case 'forest':
				Session::put('theme', 'forest');
				break;

			case 'orange':
				Session::put('theme', 'orange');
				break;

			case 'wall':
				Session::put('theme', 'wall');
				break;

			case 'sky':
				Session::put('theme', 'sky');
				break;

			default:
				Session::put('theme', 'default');
		}
		return Redirect::to('/');
	}
}