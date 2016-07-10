<?php

class ThreadMessage extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'threadmessages';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function thread()
	{
		return $this->belongsTo('Thread');
	}

}

