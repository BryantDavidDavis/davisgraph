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

Route::get('photos/photoDestroy/{id}', array('as' => 'photos.photoDestroy', 'uses' => 'PhotosController@photoDestroy'));

Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController');
Route::resource('pages', 'PagesController');
Route::resource('users', 'UsersController');
Route::resource('photos', 'PhotosController');
Route::get('/', function() {
	$photo = new Photo();
	$background_img = $photo->getPopularPhoto();
	return View::make('hello', array('background_img' => $background_img));
});

