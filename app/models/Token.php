<?php

class Token extends Eloquent{

	protected $table = 'tokens';

	protected $fillable = ['api_token', 'client', 'user_id', 'expires_on'];


	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function scopeValid()
	{
		return !Carbon\Carbon::createFromTimeStamp(strtotime($this->expires_on))->isPast();
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function user()
	{
		return $this->belongsTo('User','user_id');
	}
}
