<?php

class Section extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'sections';

	public function school()
	{
		return $this->belongsTo('School');
	}

	public function classes()
	{
		return $this->hasMany('Sclass');
	}

	public function students()
	{
		return $this->hasMany('User');
	}
}
