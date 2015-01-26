<?php

use Carbon\Carbon;

class Post extends Eloquent
{
	protected $table='posts';
	protected $primaryKey = 'id';

 	public function users()
 	{
		return $this->belongsTo('User','user_id');
	}

	public function comments()
	{
		return $this->hasMany('Comment');
	} 

	public function getCreatedAtAttribute($date)
{
    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d H:i:s');
}

public function getUpdatedAtAttribute($date)
{
    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');

}
}