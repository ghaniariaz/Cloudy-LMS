<?php

class Sfile extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'files';
	public $timestamps = false;

	public function courseItem()
	{
		return $this->morphOne('CourseItem', 'content', 'file_id');
	}

}