<?php namespace Aristona\SidebarEnhancements;

use View;
use Aristona\PluginManager\Interfaces\PluginInterface;
use Artisan;

class Plugin implements PluginInterface
{

	private $name   = "SidebarEnhancements";
	private $folder = "sidebarenhancements";

	public function __construct()
	{

	}

	public function getName()
	{
		return $this->name;
	}

	public function getFolder()
	{
		return $this->folder;
	}

	public function install()
	{
		// Install logic.

		return true;
	}

	public function uninstall()
	{
		return true;
	}

	public function getProvidedCss()
	{
		return;
	}

	public function getProvidedJs()
	{
		return;
	}

	/*
	|	Non abstract below.
	*/

	public function getAdminNavigationLinks()
	{
		return \URL::to('admin/plugin/' . $this->folder);
	}

	public function getSidebar()
	{
		$last_comments = \Comment::orderBy('id', 'DESC')->where('is_approved', 1)->take(5)->get();
		$hottest = \Gag::leftJoin(
			\DB::raw('(SELECT gag_id, SUM(vote) AS votes FROM votes GROUP BY gag_id) as v'),
			'v.gag_id', '=', 'gags.id'
		)->orderBy('votes', 'desc')->take(5)->get();

		return View::make('sidebarenhancements::partials.sidebar-enhancement')
			->with('last_comments', $last_comments)
			->with('hottest', $hottest)
			->render();
	}
}
