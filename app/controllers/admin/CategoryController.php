<?php namespace Admin;

use BaseController;
use View;
use Category;
use Input;
use Validator;
use Str;

class CategoryController extends BaseController
{

	public function index()
	{
		return View::make('theme-admin.category')
			->with('categories', Category::all());
	}

	public function add()
	{
		return View::make('theme-admin.category-add')
			->with('message_area', null);
	}

	public function addProcess()
	{
		$input = Input::all(); Input::flash();

		$rules = array( 
			'category_name'		=> 'required|min:2|max:50|unique:categories,category_name',
			'featured_text'		=> 'min:2|max:7'
		);

		$validation = Validator::make($input, $rules);

		if($validation->fails())
			return View::make('theme-admin.category-add')
				->nest('message_area', 'theme-admin.partials.alerts.error', array('message' => $validation->messages()->first()));
		
		$category = new Category(); 
			$category->category_name = $input['category_name'];
			$category->slug          = Str::slug($input['category_name']);
			$category->featured_text = $input['featured_text'] == "" ? 0 : $input['featured_text'];
		$category->save();
				
		return View::make('theme-admin.category-add')
			->nest('message_area', 'theme-admin.partials.alerts.success', array('message' => trans('admin.category_add_success')));
	}

	public function modify($id)
	{
		$id = (int) $id;
		return View::make('theme-admin.category-modify')
			->with('category', Category::find($id))
			->with('message_area', null);
	}

	public function modifyProcess($id)
	{
		$id = (int) $id;
		$input = Input::all(); Input::flash();

		$rules = array( 
			'category_name'		=> 'required|min:2|max:50',
			'featured_text'		=> 'min:2|max:7'
		);

		$validation = Validator::make($input, $rules);

		if($validation->fails())
			return View::make('theme-admin.category-modify')
				->with('category', Category::find($id))
				->nest('message_area', 'theme-admin.partials.alerts.error', array('message' => $validation->messages()->first()));
		
		$category = Category::find($id);
			$category->category_name = $input['category_name'];
			$category->slug          = Str::slug($input['category_name']);
			$category->featured_text = $input['featured_text'] == "" ? 0 : $input['featured_text'];
		$category->save();
				
		return View::make('theme-admin.category-modify')
			->with('category', Category::find($id))
			->nest('message_area', 'theme-admin.partials.alerts.success', array('message' => trans('admin.category_update_success')));
	}

	public function delete($id)
	{
		$id = (int) $id;
		Category::find($id)->delete();
		return self::index();
	}
}