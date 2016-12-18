<?php

class Comment extends Eloquent {

	public static $key = 'id';
	protected $table = 'comments';
	public $timestamps = true;

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}
}