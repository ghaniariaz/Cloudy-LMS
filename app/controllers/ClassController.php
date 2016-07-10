<?php

class ClassController extends BaseController{
	
	//Creates a view to show all the classes for a school
	public function ShowClasses()
	{		
		$school_id = Auth::user()->school_id;
		//returns classes array for the particular school
		$classes = Sclass::where('school_id', '=', $school_id)->get();

		return View::make('admin.classes',array('classes'=>$classes));
	}

	//Adds a new class to the database
	public function AddClass()
	{
		//Gets input using the input class
		$classtype_id = Input::get('classtype_id');
		$section_id = Input::get('section_id');
		$classteacher_id = Input::get('classteacher_id');
		//Adds a new class to the database
		$user = User::create(array('classtype_id'=>$classtype_id,'section_id'=>$section_id,'classteacher_id'=>$classteacher_id));

		return Redirect::action('ClassController@ShowClasses');
	}

	//Deletes a particular class from the database
	public function DeleteClass($class_id)
	{
		Classes::destroy($class_id);

		return Redirect::action('ClassController@ShowClasses');
	}

	//Shows courses for a particular class
	public function ShowCoursesFromClass($class_id)
	{
		$class = find($class_id);
		$section_id = $class->section_id;
		//Gets the number of students in a particualr section
		$studentcount = User::where('section_id', '=', $section_id)->count();
		//Gets the coursessions for a particular course
		$courses = coursesession::where('class_id', '=', $class_id)->get();

		return View::make('admin.classcourses',array('class'=>$class,'studentcount'=>$studentcount,'courses'=>$courses));
	}

	//Adds a coursesession to a class
	public function AddCourseToClass($class_id)
	{	
		$class = find($class_id)	;	
		$course_id = Input::get('course_id');
		$teacher_id = Input::get('teacher_id');
		//creates a new coursesession
		$coursesession = coursesession::create(array('class_id'=>$class_id,'course_id'=>$course_id,'teacher_id'=>$teacher_id));	
		
		return Redirect::action('ClassController@ShowCoursesFromClass');
	}

	//Deletes a coursession form a class
	public function DeleteCourseFromClass($class_id, $coursesession_id)
	{
		$coursesession = coursesession::where('coursession_id', '=', $coursession_id)->where('class_id', '=', $class_id);
		$coursesession->delete();
		return Redirect::action('ClassController@ShowCoursesFromClass');

	}
}

