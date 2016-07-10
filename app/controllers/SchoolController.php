<?php

class SchoolController extends BaseController {

	//Creates a form to edit a school
	public function EditSchool()
	{
		$school_id = Auth::user()->school_id;
		$school= School::find($school_id);

		//update school info
		return View::make('admin.settings', array('school'=>$school));		
	}

	//Updates a schools information
	public function UpdateSchool($name, $logo)
	{
		$school_id = Auth::user()->school_id;
		$school= School::find($school_id);

		//Updates school name and logo
		$school->name = Input::get('name');
		$school->logo = Input::get('logo');
		
		//Insert authentication function for logo
		$school->save();
		
		//redirect to editschool function
		return Redirect::action('SchoolController@EditSchool');
		
	}

	//Shows all schools available
	public function ViewSchools()
	{
		$schools = School::all();

		//redirect to view all schools
		return View::make('root.schools', array('school'=>$schools));
	}

	//Suspends a particular school	
	public function SuspendSchool($school_id)
	{
		$school= School::find($school_id);
		$school->suspended = TRUE;
		$school->save();

		//redirect to view all schools
		return Redirect::action('SchoolController@ViewSchools');

	}

	//Unsuspends a particular school
	public function UnSuspendSchool($school_id)
	{
		$school= School::find($school_id);
		$school->suspended = FALSE;
		$school->save();

		//redirect to view all schools
		return Redirect::action('SchoolController@ViewSchools');
	}

	//Deletes a particular school
	public function DeleteSchool($school_id)
	{
		//Delete school row corresponding to id
		User::destroy($school_id);

		//redirect to view all schools
		return Redirect::action('SchoolController@ViewSchool');
	}

}