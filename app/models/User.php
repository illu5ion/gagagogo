<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	public static $key = 'id';
	protected $table = 'userdata';
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	public function getAssociatedAvatar()
	{
		switch($this->registration_type)
		{
			case 'standard':
				return 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($this->usermail)));
				break;

			case 'facebook':
				return 'https://graph.facebook.com/' . $this->username . '/picture';
				break;

			default:
				return 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($this->usermail)));
		}
	}

	public function getPermissionForHumans()
	{
		switch( (int) $this->authority)
		{
			case 0:
				return trans('admin.admin');
				break;

			case 1:
				return trans('admin.user');
				break;

			case 255:
				return trans('admin.banned');
				break;
		}
	}

	public function getPermissionForHumansStyled()
	{
		switch( (int) $this->authority)
		{
			case 0:
				return '<span class="badge badge-inverse">' . trans('admin.admin') . '</span>';
				break;

			case 1:
				return '<span class="badge badge-success">' . trans('admin.user') . '</span>';
				break;

			case 255:
				return '<span class="badge badge-warning">' . trans('admin.banned') . '</span>';
				break;
		}
	}

	public function getPermissionForHumansStyledBootstrap3()
	{
		switch( (int) $this->authority)
		{
			case 0:
				return '<span class="label label-success">' . trans('admin.admin') . '</span>';
				break;

			case 1:
				return '<span class="label label-warning">' . trans('admin.user') . '</span>';
				break;

			case 255:
				return '<span class="label label-danger">' . trans('admin.banned') . '</span>';
				break;
		}
	}
}