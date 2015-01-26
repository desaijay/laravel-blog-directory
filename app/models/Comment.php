<?php

class Comment extends Eloquent
{
	protected $table= 'comments';

	public function post()
	{
		return $this->belongsTo('Post','post_id');
	}

	public function user()
	{
		return $this->belongsTo('User');

	}


}