<?php namespace Admin;

use BaseController;
use View;
use Settings;
use Input;
use Validator;
use Str;

class SettingController extends BaseController
{

	public function index()
	{
		return View::make('theme-admin.settings');
	}

	public function process()
	{
		$input = Input::all();

		$rules = array(
			'copyright'    => 'required|max:500|min:3',
			'facebook_url' => 'required|max:100|min:6'
		);

		$validation = Validator::make($input, $rules);

		if($validation->fails())
			return View::make('theme-admin.partials.alerts.error-generic')
				->with('message', $validation->messages()->first());

		// If there is logo uploaded...
		if( ( (bool) isset($input['logo']) === true) && ( (bool) is_object($input['logo']) === true))
		{
			$randomName = Str::random(10);
			Input::file('logo')->move(public_path() . '/assets/public/uploads/', $randomName . '.png');

			$settings = Settings::first();
				$settings->logo = $randomName . '.png';
			$settings->save();
		}

		// If there is watermark uploaded...
		if( ( (bool) isset($input['watermark']) === true) && ( (bool) is_object($input['watermark']) === true))
		{
			$randomName = Str::random(10);
			Input::file('watermark')->move(public_path() . '/assets/public/uploads/', $randomName . '.png');

			$settings = Settings::first();
				$settings->watermark = $randomName . '.png';
			$settings->save();
		}

		// Set the remaining values
		$settings = Settings::first();
			$settings->copyright             = $input['copyright'];
			$settings->autoapprove_comments  = isset($input['autoapprove_comments_checkbox']) ? (int) 1 : (int) 0;
			$settings->autoapprove_gags      = isset($input['autoapprove_gags_checkbox']) ? (int) 1 : (int) 0;
			$settings->auto_add_watermark    = isset($input['auto_add_watermark']) ? (int) 1 : (int) 0;
			$settings->facebook_like_address = $input['facebook_url'];
			$settings->google_maps_code      = $input['google_maps_code'];
			$settings->google_analytics_code = $input['google_analytics_code'];
			$settings->slogan                = $input['slogan'];
			$settings->color_type            = $input['color_type'];
			$settings->email                 = $input['email'];
			$settings->address               = $input['address'];
			$settings->phone                 = $input['phone'];
		$settings->save();

		return View::make('theme-admin.partials.alerts.success-generic')
			->with('message', trans('admin.settings_update_success'));
	}
}