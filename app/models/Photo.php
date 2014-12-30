<?php

class Photo extends Eloquent {
	
	public $timestamps = true;
	

	protected $fillable = ['title', 'description', 'imagename', 'user_id', 'thumbnailname'];
	
/*
	public static $rules = [
		'username' => 'required', 
		'password' => 'required|confirmed',
		'password_confirmation' => 'required'
	];
*/
	
	
	public  $messages;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'photos';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden;
	
	public function user() {
		return $this->belongsTo('User');
	}
	
	public function user_photos_path() {
		return storage_path() . '/uploads/'.Auth::user()->username.'/';
	}
	
	/**
	* stores the item in file, returns the name to store in the database
	*/
	public function makeThumbnail($uploaded_image) {
		$imagename = $uploaded_image->getClientOriginalName();
		$image = Image::make($uploaded_image->getRealPath());
		//dd($image);
		$thumbnailname = "thumb_".$uploaded_image->getClientOriginalName();
		
		$thumbnail = $image->resize(200, null, function ($constraint) {
			$constraint->aspectRatio();
		});
		
		$thumbnail->save($this->user_photos_path().$thumbnailname);
		
		return $thumbnailname;
	}
	public function getPhotoFileData($my_photos) {
/*
		print_r($my_photos);
		die;
*/
		$files = array();
		foreach($my_photos as $my_photo) {
			//the files array should store a group of objects which each have a data attribute and an id
			$details = new stdClass();
			$details->data = Image::make($this->user_photos_path().$my_photo->thumbnailname)->encode('data-url');
			$details->id = $my_photo->id;
			array_push($files, $details);
		}
		return $files;
	}
	
	public function getBigPhoto($id) {
		$my_photo = $this->find($id);
		return Image::make($this->user_photos_path().$my_photo->imagename)->encode('data-url');
	}
/*
	public function getPhoto($thumbnailname) {
		return $this->user_photos_path().$thumbnailname;
		
		return Image::make($this->user_photos_path().$thumbnailname)->response();
	}
*/


}
