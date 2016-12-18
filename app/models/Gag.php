<?php

class Gag extends Eloquent {

	public static $key = 'id';
	protected $table = 'gags';
	public $timestamps = true;

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}

    public function endpoint()
    {
        return URL::to('gag/' . $this->slug . '/' . $this->id);
    }
}
