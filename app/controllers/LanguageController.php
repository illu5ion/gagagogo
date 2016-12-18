<?php

class LanguageController extends BaseController {

	public function toTurkish()
	{
		Session::put('lang', 'tr');
		return Redirect::back();
	}

	public function toEnglish()
	{
		Session::put('lang', 'en');
		return Redirect::back();
	}
}