<?php

class CourseItem extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'courseitems';

	public function courseSession()
	{
		return $this->belongsTo('CourseSession', 'coursesession_id');
	}

	public function threads()
	{
		return $this->hasMany('Thread', 'courseitem_id');
	}

	public function content()
	{
		return $this->morphTo();
	}

}
