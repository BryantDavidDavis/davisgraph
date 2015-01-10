<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	
	public $timestamps = true;
	
	protected $fillable = ['username', 'password'];
	
	public static $rules = [
		'username' => 'required', 
		'password' => 'required|confirmed',
		'password_confirmation' => 'required'
	];
	
	public  $messages;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
/*
	public function scopeGoodPassword($query) {
		return $query->where('password', '>', 1);
	}
*/
	public function isValid($input) {
		
		// removed $this->attributes and replaced with input and added input as a parameter
		$validation = Validator::make($input, static::$rules);
		
		if ($validation->passes()) {
			return true;
		}
		$this->messages = $validation->messages();
		return false;
	}
	//added the following rememberToken commands after reading update on Laravel site
	public function getRememberToken(){
   		 return $this->remember_token;
	}

	public function setRememberToken($value){
    		$this->remember_token = $value;
	}

	public function getRememberTokenName(){
    		return 'remember_token';
	}
	
	public function photos() {
		return $this->hasMany('Photo');
	}
	
	public function comments() {
		return $this->hasMany('Comments');
	}


}
