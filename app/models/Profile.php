<?php

class Profile extends Eloquent
{
	protected $table='profiles';
	protected $primaryKey='id';

	public function user()
	{
		return $this->belongsTo('User');
	}
}
