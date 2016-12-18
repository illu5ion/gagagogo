<?php namespace Admin;

use BaseController;
use View;
use Gag;
use Input;
use Image;
use File;

class GagController extends BaseController
{

	public function __construct() { }

	public function index()
	{
		return View::make('theme-admin.gag')
			->with('gags', Gag::with('user')->get());
	}

	public function approve($id)
	{
		$gag = Gag::find($id);
		
		if(!$gag)
			return \Redirect::to('admin/gag');

		$gag->is_approved = 1;
		$gag->save();

		return \Redirect::to('admin/gag');
	}

	public function disapprove($id)
	{
		$gag = Gag::find($id);
		
		if(!$gag)
			return \Redirect::to('admin/gag');

		$gag->is_approved = 0;
		$gag->save();

		return \Redirect::to('admin/gag');
	}

	public function feature($id)
	{
		$id = (int) $id;
		
		$gag = Gag::find($id);
		
		// Make sure we're trying to crop an image
		if(!$gag) return \Redirect::to('admin/gag');
		if($gag->type !== 'image') return \Redirect::to('admin/gag');

		return View::make('theme-admin.feature')
			->with('message_area', null)
			->with('gag', $gag);
	}


	public function featureProcess()
	{
		
		$id = Input::get('gag_id');

		$gag = Gag::find($id);

		// Get inputs
		$x = Input::get("x");
		$y = Input::get("y");
		$w = Input::get("width");
		$h = Input::get("height");

		// If we have a cropped image already, delete it.
		File::delete(public_path() . '/assets/public/uploads/cropped_' . $gag->gag_url . '.png');

		// Crop the image and name it
		$img = Image::make(public_path() . '/assets/public/uploads/' . $gag->gag_url . '.png');
			$img->crop($w, $h, $x, $y);
			$img->resize(300, 156);
		$img->save(public_path() . '/assets/public/uploads/cropped_' . $gag->gag_url . '.png', 80);
		
		// Add featured value to database.
			$gag->is_featured = 1;
		$gag->save();

		return View::make('theme-admin.partials.alerts.success-generic')
			->with('message', trans('admin.gag_feature_success'));
	}

	public function unfeature($id)
	{
		$id = (int) $id;
		
		$gag = Gag::find($id);
			$gag->is_featured = 0;
		$gag->save();

		return \Redirect::to('admin/gag');
	}

	public function delete($id)
	{
		$id = (int) $id;
		\Notification::where('url', $id)->delete();
		Gag::find($id)->delete();
		return \Redirect::to('admin/gag');
	}
}