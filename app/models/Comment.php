<?php
	
class Comment extends Eloquent {
	
	public $timestamps = true;
	
	protected $table = 'comments';
	
	protected $fillable = array('comment', 'user_id', 'photo_id');
	
	public function user() {
		return $this->belongsTo('User');
	}
	public function photo() {
		return $this->belongsTo('Photo');
	}	
}