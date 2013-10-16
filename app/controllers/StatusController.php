<?php

use \Carbon\Carbon;
use TwitterOAuth\TwitterOAuth;

class StatusController extends AuthorizedController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sites = Site::all();

		foreach($sites as $site){

			$url = get_headers($site->url, 1);
			echo '<pre>';
			print_r($url);
			echo '</pre>';
			if($url[0] ==  'HTTP/1.1 404 Not Found'){
				/**
				 * Is 404
				 */

				$checkForExisting = Status::where('request_id', '=', $site->id)
										  ->where('error_resolved', '=', '')
										  ->first();

				if($checkForExisting){
					$checkForExisting->touch();
				} else {
					$error = new Status;
					$error->request_id = $site->id;
					$error->response_code = '404';
					$error->save();



					$creation = Carbon::now()->toDayDateTimeString();

					$message  = "The site at: " . $site->url . ", is down. \n";
					$message .= "Logged: " . $creation;

					$config = array(
					    'consumer_key' => '9Z2Vyw5nCBRrVgmljPylg',
					    'consumer_secret' => '9CNIQcYhzNrnf6IqBBQhdO0bm3BpOVfqkggW8aboQ0c',
					    'oauth_token' => '1920725383-cokYmw7PfqRTL98pGIO2Y7hl8OpajtVZTf3ZZBW',
					    'oauth_token_secret' => 'FRLv16boAh4l0X0DRpbecRkZ1l5ENJWyycLrXU0MxEI',
					    'output_format' => 'json'
					);

					$tw = new TwitterOAuth($config);

					$status = array( 'status' => strip_tags($message) );

					$mytweet = $tw->post('statuses/update', $status ); 
				}

			} else {
				/**
				 * Not 404
				 */
				
				$checkForExisting = Status::where('request_id', '=', $site->id)
										  ->where('error_resolved', '=', '')
										  ->first();

				if($checkForExisting){
					$checkForExisting->error_resolved = true;
					$checkForExisting->save();

					$site = Site::find($checkForExisting->request_id);

					$message  = "The site at: " . $site->url . ", is back up. \n";

					$config = array(
					    'consumer_key' => '9Z2Vyw5nCBRrVgmljPylg',
					    'consumer_secret' => '9CNIQcYhzNrnf6IqBBQhdO0bm3BpOVfqkggW8aboQ0c',
					    'oauth_token' => '1920725383-cokYmw7PfqRTL98pGIO2Y7hl8OpajtVZTf3ZZBW',
					    'oauth_token_secret' => 'FRLv16boAh4l0X0DRpbecRkZ1l5ENJWyycLrXU0MxEI',
					    'output_format' => 'json'
					);

					$tw = new TwitterOAuth($config);

					$status = array( 'status' => strip_tags($message) );

					$mytweet = $tw->post('statuses/update', $status );
				}
				
			}

		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}