<?php

class HomeController extends BaseController {

	public function __construct() {
		View::share('site_users', User::all());
	}
	
	public function showWelcome() {
		$photo = new Photo();
		$background_img = $photo->getPopularPhoto();
		$trip_photos = $photo->where('showme', 1)->get();
		foreach($trip_photos as $trip_photo) {
			$trip_photo->comments = $trip_photo->comments()->get();
		}
		$trip_photos->photos = $photo->getPhotoFileData($trip_photos);

		return View::make('trip', array('background_img' => $background_img, 'trip_photos' => $trip_photos));
	}

}
