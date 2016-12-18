<?php namespace Admin;

use BaseController;
use View;
use Category;
use Input;
use Validator;
use Str;
use Widget;

class WidgetController extends BaseController
{

	public function index()
	{
		return View::make('theme-admin.widget')
			->with('widgets', Widget::all());
	}

	public function addString()
	{
		return View::make('theme-admin.widget-add-string')
			->with('message_area', null);
	}

	public function addStringProcess()
	{
		$input = Input::all(); Input::flash();

		$rules = array( 
			'name'    => 'required|min:2|max:50|unique:widgets,name',
			'content' => 'min:2|max:2000'
		);

		$validation = Validator::make($input, $rules);

		if($validation->fails())
			return View::make('theme-admin.widget-add-string')
				->nest('message_area', 'theme-admin.partials.alerts.error', array('message' => $validation->messages()->first()));
		
		$widget = new Widget(); 
			$widget->name    = $input['name'];
			$widget->content = $input['content'];
			$widget->type    = 'string';
		$widget->save();

		return View::make('theme-admin.widget-add-string')
			->nest('message_area', 'theme-admin.partials.alerts.success', array('message' => trans('admin.widget_add_success')));
	}

	public function addUpload()
	{
		return View::make('theme-admin.widget-add-upload')
			->with('message_area', null);
	}

	public function addUploadProcess()
	{
		$input = Input::all(); Input::flash();

		$rules = array( 
			'name'    => 'required|min:2|max:50|unique:widgets,name',
			'content' => 'required'
		);

		$validation = Validator::make($input, $rules);

		if($validation->fails())
			return View::make('theme-admin.widget-add-upload')
				->nest('message_area', 'theme-admin.partials.alerts.error', array('message' => $validation->messages()->first()));

		$extension = Input::file('content')->getClientOriginalExtension();
		$content   = null;
		$type      = null;

		if($extension === 'swf')
		{
			$randomName = Str::random(10);
			$type = 'swf';
			Input::file('content')->move(public_path() . '/assets/public/uploads/', $randomName . '.swf');
		}

		if($extension === 'jpg' || $extension === 'png')
		{
			$randomName = Str::random(10);
			$type = 'image';
			Input::file('content')->move(public_path() . '/assets/public/uploads/', $randomName . '.png');
		}

		if($extension === 'gif')
		{
			$randomName = Str::random(10);
			$type = 'gif';
			Input::file('content')->move(public_path() . '/assets/public/uploads/', $randomName . '.gif');
		}

		// Check if user tried to add something that is not supported.
		if($type === null)
			return View::make('theme-admin.widget-add-upload')
				->nest('message_area', 'theme-admin.partials.alerts.error', array('message' => trans('admin.widget_unsupported_extension')));
		
		$widget = new Widget(); 
			$widget->name    = $input['name'];
			$widget->content = $randomName;
			$widget->type    = $type;
		$widget->save();

		return View::make('theme-admin.widget-add-upload')
			->nest('message_area', 'theme-admin.partials.alerts.success', array('message' => trans('admin.widget_add_success')));
	}

	public function delete($id)
	{
		$id = (int) $id;
		Widget::find($id)->delete();
		return self::index();
	}
}