<?php

class Notification extends Eloquent {

	public static $key = 'id';
	protected $table = 'notifications';
	public $timestamps = true;

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}

	public function gags()
	{
		return $this->belongsTo('Gag', 'url', 'id');
	}
}