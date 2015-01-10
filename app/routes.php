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
	Route::get('logout', 'SessionsController@destroy');
	Route::post('photos/uploadProgress', array('as' => 'photos.uploadProgress', 'uses' => 'PhotosController@uploadProgress'));
	Route::get('photos/photoDestroy', array('as' => 'photos.photoDestroy', 'uses' => 'PhotosController@photoDestroy'));
	Route::get('photos/photoRotate', array('as' => 'photos.photoRotate', 'uses' => 'PhotosController@photoRotate'));
	Route::post('photos/updateField', array('as' => 'photos.updateField', 'uses' => 'PhotosController@updateField'));
	Route::get('photos/photoToggleTripShow', array('as' => 'photos.photoToggleTripShow', 'uses' => 'PhotosController@photoToggleTripShow'));
	Route::get('photos/showTripStatus', array('as' => 'photos.showTripStatus', 'uses' => 'PhotosController@showTripStatus'));	
	Route::resource('photos', 'PhotosController');
	Route::resource('comments', 'CommentsController');	
});

Route::resource('users', 'UsersController');
Route::resource('sessions', 'SessionsController');

Route::get('/', 'HomeController@showWelcome');