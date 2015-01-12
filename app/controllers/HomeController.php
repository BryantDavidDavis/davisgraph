<?php

class HomeController extends BaseController {
	protected $photo;
	
	public function __construct(Photo $photo) {
		$this->photo = $photo;
		View::share('site_users', User::all());
	}
	
	public function showWelcome() {
		
		$background_img = $this->photo->getPopularPhoto();
		//$photos = $this->photo->where('showme', 1)->get();
		$photos = $this->photo->with('user', 'comments')->get();
/*
		foreach($photos as $photo) {
			foreach($photo->comments as $comments) {
				echo $comments->comment;
			}
		}
*/
// 		die;
		$trip_photos = $this->photo->getPhotoFileData($photos);
		
		return View::make('trip', array('background_img' => $background_img, 'trip_photos' => $trip_photos));
	}

}
