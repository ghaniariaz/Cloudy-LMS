<?php

class ClassType extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'classtypes';
	public $timestamps = false;

	public function school()
	{
		return $this->belongsTo('School');
	}

	public function classes()
	{
		return $this->hasMany('Class');
	}

}