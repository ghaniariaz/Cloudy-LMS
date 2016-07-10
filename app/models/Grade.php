<?php

class Grade extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'grades';

	public function user()
	{
		$this->belongsTo('User', 'student_id');
	}
	
	public function gradeType()
	{
		return $this->belongsTo('GradeType', 'gradetype_id');
	}

}
