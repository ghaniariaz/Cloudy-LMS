<?php

class GradeController extends BaseController{

	public function ShowGrades($coursesession_id)
   	{
   		$courseSession = CourseSession::find($coursesession_id);
   		$course = Course::find($courseSession->course_id);
   		$courseName = $course->name;
   		$grades = $courseSession->grades()->where('student_id', '=', Auth::User()->id)->get();
   		$class = Sclass::where('section_id', '=', Auth::User()->section_id)->first();
   		$otherCourseSessions = CourseSession::where('class_id', '=', $class->id)->get();   		
   		
   		return View::make('cms.grades', array('coursename'=>$courseName, 'grades'=>$grades, 'othercourses'=>$otherCourseSessions, 'cs' => $courseSession));
    }


	public function ShowGradeType($coursesession_id)
	{
		$courseSession = CourseSession::find($coursesession_id);
		$gradeTypes = GradeType::where('coursesession_id', '=', $coursesession_id)->get();
		return View::make('teacher.gradetypes', array('course'=>$courseSession, 'gradetypes'=>$gradeTypes));
	}


	public function AddGradeType($coursesession_id)
	{
		$gradeType = new GradeType();
		$gradeType->name = Input::get('name');
		$gradeType->maxmarks = Input::get('maxmarks');
		$gradeType->save();
		return Redirect::Action('GradeController@ShowGradeTypes');
	}


	public function DeleteGradeTypes($gradetype_id)
	{
		$gradeType = GradeType::find($gradetype_id);
		$gradeType->delete();
		return Redirect::Action('GradeController@ShowGradeTypes');
	}


	public function EditGrades($gradetype_id)
	{
		$gradeType = GradeType::find($gradetype_id);
		$courseSession = CourseSession::find($gradeType->coursesession_id);
		$grades = Grade::where('gradetype_id', '=', $gradetype_id)->get();
		$class = Sclass::find($courseSession->class_id);
		$students = User::where('section_id', '=', $class->section_id);
		return View::make('teachers.grades', array('course'=>$courseSession, 'gradetype'=>$gradeType, 'grades'=>$grades, 'students'=>$students));
	}


	public function SubmitGrades($gradetype_id)
	{
		$grades = Input::get('grades');

		foreach($grades as $grade)
			Grade::Insert(array('student_id'=>$grade['student_id'], 'marks'=>$grade['marks']));

		return Redirect::Action('GradeController@ShowGradeTypes');
	}
}