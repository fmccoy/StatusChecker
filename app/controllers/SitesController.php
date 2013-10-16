<?php

class SitesController extends AuthorizedController{

	public function showIndex()
	{
		$sites = Site::get();

		return View::make('dashboard.index')
			->with('sites', $sites );
	}

	public function createSite(){
		return View::make('site.new');
	}

	public function insertSite(){
		
		$input = Input::get();

		if( ! $input ) return;

		$protocol = $input['protocol'];
		$path = $input['path'];
		$url = $protocol.$path;

		$site = new Site;
		$site->created_by = Auth::user()->id;
		$site->url = $url;
		$site->save();

		return Redirect::to('dashboard');
	}
}