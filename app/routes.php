<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::controller('account','AccountController' );
Route::get('/', 'HomeController@showIndex');
Route::get('dashboard', 'SitesController@showIndex');

//Route::get('site/new', 'SitesController@createSite');
//Route::post('site/new', 'SitesController@insertSite');

Route::resource('site', 'SiteController');
Route::resource('status', 'StatusController');
