<?php

class GradeType extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'gradetypes';
	public $timestamps = false;

	public function courseSession()
	{
		return $this->belongsTo('CourseSession', 'coursesession_id');
	}

	public function grades()
	{
		return $this->hasMany('Grade', 'gradetype_id');
	}

}