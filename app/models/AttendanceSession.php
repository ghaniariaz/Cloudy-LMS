<?php

class AttendanceSession extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'attendancesessions';

	public function courseSession()
	{
		return $this->belongsTo('CourseSession', 'coursesession_id');
	}

	public function attendances()
	{
		return $this->hasMany('Attendance', 'attendancesession_id');
	}

}