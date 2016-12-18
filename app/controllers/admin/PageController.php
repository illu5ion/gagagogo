<?php namespace Admin;

use BaseController;
use View;
use Page;
use Input;
use Validator;
use Str;

class PageController extends BaseController
{
	public function index()
	{
		return View::make('theme-admin.page')
			->with('pages', Page::all());
	}

	public function add()
	{
		return View::make('theme-admin.page-add')
			->with('message_area', null);
	}

	public function addProcess()
	{
		$input = Input::all(); Input::flash();

		$rules = array( 
			'title'   => 'required|max:15|unique:pages,title',
			'content' => 'required|min:2|max:3000',
		);

		$validation = Validator::make($input, $rules);

		if($validation->fails())
			return View::make('theme-admin.page-add')
				->nest('message_area', 'theme-admin.partials.alerts.error', array('message' => $validation->messages()->first()));
		
		$page = new Page(); 
			$page->title   = $input['title'];
			$page->content = $input['content'];
			$page->slug    = Str::slug($input['title']);
		$page->save();
				
		return View::make('theme-admin.page-add')
			->nest('message_area', 'theme-admin.partials.alerts.success', array('message' => trans('admin.page_add_success')));
	}

	public function delete($id)
	{
		$id = (int) $id;
		Page::find($id)->delete();
		return self::index();
	}
}