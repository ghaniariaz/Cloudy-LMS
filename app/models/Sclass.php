<?php

class Sclass extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'classes';

	public function classTeacher()
	{
		return $this->belongsTo('User', 'classteacher_id');
	}

	public function classType()
	{
		return $this->belongsTo('ClassType');
	}

	public function section()
	{
		return $this->belongsTo('Section');
	}

	public function courseSessions()
	{
		return $this->hasMany('CourseSession', 'class_id');
	}

	public function courseItems()
	{
		return $this->hasManyThrough('CourseItem', 'CourseSession', 'class_id', 'coursesession_id');
	}
}
