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

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('countries', 'CountriesController');

Route::get('crawler/contests', 'CrawlerController@contests');
Route::get('crawler/contest/{id}', 'CrawlerController@contest');

Route::get('slugger/cities', 'SluggerController@cities');
Route::get('slugger/countries', 'SluggerController@countries');
Route::get('slugger/contests', 'SluggerController@contests');