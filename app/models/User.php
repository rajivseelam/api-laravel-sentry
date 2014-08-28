<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends SentryUserModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

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
	protected $hidden = array('password', 'remember_token','persist_code','reset_password_code','permissions','activation_code');

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function tokens()
	{
		return $this->hasMany('Token');
	}

}
