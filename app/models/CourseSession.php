<?php

class CourseSession extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'coursesessions';

	public function taughtBy()
	{
		return $this->belongsTo('User', 'teacher_id');
	}

	public function sclass()
	{
		return $this->belongsTo('Sclass', 'class_id');
	}

	public function courseItems()
	{
		return $this->hasMany('CourseItem', 'coursesession_id');
	}

	public function attendanceSessions()
	{
		return $this->hasMany('AttendanceSession', 'coursesession_id');
	}

	public function attendances()
	{
		return $this->hasManyThrough('Attendance', 'AttendanceSession', 'coursesession_id', 'attendancesession_id');
	}

	public function gradeTypes()
	{
		return $this->hasMany('GradeType', 'coursesession_id');
	}

	public function grades()
	{
		return $this->hasManyThrough('Grade', 'GradeType', 'coursesession_id', 'gradetype_id');
	}

	public function course()
	{
		return $this->belongsTo('Course');
	}

	public function teacher()
	{
		return $this->belongsTo('User', 'teacher_id');
	}

}
