<?php

class Thread extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'threads';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function courseItem()
	{
		return $this->belongsTo('CourseItem', 'courseitem_id');
	}

	public function threadMessages()
	{
		return $this->hasMany('ThreadMessage');
	}

}
