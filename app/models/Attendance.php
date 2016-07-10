<?php

class Attendance extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'attendances';
	public $timestamps = false;

	public function user()
	{
		return $this->belongsTo('User', 'student_id');
	}

	public function attendanceSession()
	{
		return $this->belongsTo('AttendanceSession', 'attendancesession_id');
	}

}

