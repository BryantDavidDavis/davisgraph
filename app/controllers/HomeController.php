<?php

class HomeController extends BaseController {

	public function __construct() {
		View::share('site_users', User::all());
	}
	
	public function showWelcome() {
		$photo = new Photo();
		$background_img = $photo->getPopularPhoto();
		$trip_photos = $photo->where('showme', 1)->get();
		$trip_photos = $photo->getPhotoFileData($trip_photos);

		return View::make('trip', array('background_img' => $background_img, 'trip_photos' => $trip_photos));
	}

}
