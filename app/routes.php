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

Route::get('login', 'SessionsController@create');

Route::group(array('before' => 'auth'), function() {

	Route::post('photos/uploadProgress', array('as' => 'photos.uploadProgress', 'uses' => 'PhotosController@uploadProgress'));
	Route::get('photos/photoDestroy', array('as' => 'photos.photoDestroy', 'uses' => 'PhotosController@photoDestroy'));
	Route::get('logout', 'SessionsController@destroy');
	
	Route::resource('photos', 'PhotosController');	
});

Route::resource('users', 'UsersController');
Route::resource('sessions', 'SessionsController');

Route::get('/', function() {
	$photo = new Photo();
	$background_img = $photo->getPopularPhoto();
	return View::make('hello', array('background_img' => $background_img));
});

