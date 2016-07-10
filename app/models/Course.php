<?php

class Course extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'courses';
	public $timestamps = false;

	public function school()
	{
		return $this->belongsTo('School');
	}

	public function courseSessions()
	{
		return $this->hasMany('CourseSession');
	}

}
