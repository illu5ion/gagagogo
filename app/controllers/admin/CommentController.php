<?php namespace Admin;

use BaseController;
use View;
use Comment;

class CommentController extends BaseController
{
	public function index()
	{
		return View::make('theme-admin.comment')
			->with('message_area', null)
			->with('comments', Comment::with('user')->orderBy('id', 'DESC')->get());
	}

	public function massApprove()
	{
		Comment::where('is_approved', '=', (int) 0)->update(array('is_approved' => (int) 1));

		return View::make('theme-admin.comment')
			->nest('message_area', 'theme-admin.partials.alerts.success', array('message' => trans('admin.comment_mass_approve_success')))
			->with('comments', Comment::with('user')->orderBy('id', 'DESC')->get());
	}

	public function approve($id)
	{
		$id = (int) $id;
		$comment = Comment::find($id);
			$comment->is_approved = (int) 1;
		$comment->save();
		
		return View::make('theme-admin.comment')
			->nest('message_area', 'theme-admin.partials.alerts.success', array('message' => trans('admin.comment_approve_success')))
			->with('comments', Comment::with('user')->orderBy('id', 'DESC')->get());
	}

	public function disapprove($id)
	{
		$id = (int) $id;
		$comment = Comment::find($id);
			$comment->is_approved = (int) 0;
		$comment->save();

		return View::make('theme-admin.comment')
			->nest('message_area', 'theme-admin.partials.alerts.success', array('message' => trans('admin.comment_disapprove_success')))
			->with('comments', Comment::with('user')->orderBy('id', 'DESC')->get());
	}

	public function delete($id)
	{
		$id = (int) $id;
		$comment = Comment::find($id);

		if(!$comment)
		{
			return \Redirect::to('admin/comment');
		}

		// All is well
		$comment->delete();
		return View::make('theme-admin.comment')
			->nest('message_area', 'theme-admin.partials.alerts.success', array('message' => trans('admin.comment_delete_success')))
			->with('comments', Comment::with('user')->orderBy('id', 'DESC')->get());
	}
}