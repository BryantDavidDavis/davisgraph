<?php
	
class Comment extends Eloquent {
	
	public $timestamps = true;
	
	protected $table = 'comments';
	
	protected $fillable = ['comment'];
	
	public function user() {
		return $this->belongsTo('User');
	}
	public function photo() {
		return $this->belongsTo('Photo');
	}	
}