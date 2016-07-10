<?php

class Note extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'notes';
	public $timestamps = false;

	public function courseItem()
	{
		return $this->morphOne('CourseItem', 'content');
	}
	
}