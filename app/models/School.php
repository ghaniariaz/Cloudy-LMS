<?php

class School extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'schools';

	public function users()
	{
		return $this->hasMany('User');
	}

	public function classTypes()
	{
		return $this->hasMany('ClassType');
	}

	public function sections()
	{
		return $this->hasMany('Section');
	}

	public function courses()
	{
		return $this->hasMany('Course');
	}


}
