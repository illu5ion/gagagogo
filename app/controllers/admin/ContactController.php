<?php namespace Admin;

use BaseController;
use View;
use Contact;

class ContactController extends BaseController
{
	public function index()
	{
		return View::make('theme-admin.contact')
			->with('contacts', Contact::all());
	}

	public function delete($id)
	{
		$id = (int) $id;
		Contact::find($id)->delete();
		return self::index();
	}
}