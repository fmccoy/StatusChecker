<?php

class SiteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sites = Site::get();

		return View::make('dashboard.index')
			->with('sites', $sites );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('site.new');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
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

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$site = Site::find($id);
		if($site){
			return View::make('site.single')->with('site', $site );
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$site = Site::find($id);
		return View::make('site.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$site = Site::find($id);
		$input = Input::get();

		if($input){
			$site->url = $input['url'];
			$site->save();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$site = Site::find($id);

		if($site){
			$site->delete();
			return Redirect::to('dashboard');
		}
		
	}

}