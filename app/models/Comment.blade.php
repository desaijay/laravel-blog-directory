<?php

class Comment extends Eloquent
{
	protected $table= 'comments';

	public function post()
	{
		return $this->belongsTo('Post');
	}
}