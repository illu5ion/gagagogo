<?php

class Vote extends Eloquent {

	public static $key = 'id';
	protected $table = 'votes';
	public $timestamps = false;
}