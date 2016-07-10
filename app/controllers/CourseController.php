<?php

class CourseController extends BaseController {

	private $recentsCount = 10;

	private function getCourseGrades($coursesession_id, $count)
	{
		$query = "";

		$gradeTypes = GradeType::where('coursesession_id', '=', $coursesession_id)->get();

		for($i = 0; $i < count($gradeTypes); $i++)
		{
			if($i != 0)
				$query += " OR ";

			$gradeType = $gradeTypes[$i];
			$query += "gradetype_id = " + $gradeType->id;
		}

		return Grade::whereRaw($query)->orderBy('updated_at', 'DESC')->take($count)->get();
	}

	//generic function for getting all CourseItems when given an array of CourseSessions
	private function getAllCourseItems($courses)
	{
		$query = "";

		for($i = 0; $i < count($courses); $i++)
		{
			if($i != 0)
				$query += " OR ";

			$course = $courses[$i];
			$query += "coursesession_id = " + $course->coursesession_id;
		}

		return CourseItem::whereRaw($query)->orderBy('updated_at', 'DESC')->get();
	}

	//generic function for getting recent threads given an array of all CourseItems (-1 count for all)
	private function getThreads($allLectures, $count)
	{				
		$query = "";

		for($i = 0; $i < count($allLectures); $i++)
		{
			if($i != 0)
				$query += " OR ";

			$lecture = $allLectures[$i];
			$query += "courseitem_id = " + $lecture->id;
		}

		if($count != -1)
			return Thread::whereRaw($query)->orderBy('updated_at', 'DESC')->take($count)->get();

		else
			return Thread::whereRaw($query)->orderBy('updated_at', 'DESC')->get();
	}


	public function ShowCourse($coursesession_id) 
	{
		$courseSession = CourseSession::find($coursesession_id);
		$items = CourseItem::where('coursesession_id', '=', $coursesession_id)->get();
		$teacher = User::where('id', '=', $courseSession->teacher_id)->first();
		// $attendanceSession = AttendanceSession::where('coursesession_id', '=', $coursesession_id)->first();
		// $allAttendances = Attendance::whereRaw('attendancesession_id = ' + $attendanceSession->id + ' and student_id = ' + Auth::user()->id)->get();

		// $total = 0;
		// $present = 0;

		// foreach($allAttendances as $attendance)
		// {
		// 	{
		// 		if($attendance->present)
		// 			$present++;

		// 		$total++;
		// 	}
		// }

		// $attendancePercentage = $present/$total * 100;

		// $recentThreads = $this->getThreads($items, $this->recentsCount);
		
		// $recentGrades = $this->getCourseGrades($coursesession_id, $this->recentsCount);

		return View::make('cms.course', array('coursesession'=>$courseSession, 'items'=>$items, 'teacher'=>$teacher, /*'attendance'=>$attendancePercentage, 'recentthreads'=>$recentThreads, 'recentgrades'=>$recentGrades*/));
	}

	public function ShowCourses() 
	{
		$courses = Course::where('school_id', '=', Auth::User()->school_id)->get();

		return View::make('admin.courses', array('courses', $courses));
	}

	public function AddCourse() 
	{
		$course = new Course();

		$course->name = Input::get('name');
		$course->school_id = Auth::User()->id;
		$course->save();

		return Redirect::Action('CourseController@ShowCourses');
	}

	public function DeleteCourse($course_id) 
	{
		Course::destroy($course_id);

		return Redirect::Action('CourseController@ShowCourses');
	}

	public function ShowLecture($courseitem_id) 
	{
		$item = CourseItem::find($courseitem_id);
		$courseName = $item->courseSession->course->name;
		$threads = $item->threads;
		// $item = CourseSession::find($coursesession_id);
		// $course = Course::where('courseName', '=', $item->course_id)->first();
		// $courseName = $course->name;
		// $courseItems = CourseItem::where('coursesession_id', '=', $item->id);
		// $threads = getThreads($courseItems, -1);

		return View::make('cms.lecture', array('item'=>$item, 'coursename'=>$courseName, 'threads'=>$threads/*, 'page'=>$page, 'pagecount'=>$pageCount*/));
	}

	public function AddLecture($coursesession_id) 
	{
		$lecture = new CourseItem();

		$lecture->name = Input::Get('name');
		$lecture->brief = Input::Get('brief');
		$lecture->coursesession_id = $coursesession_id;
		$lecture->content_type = Input::Get('content_type');
		$lecture->save();

		//what's content id?

		return Redirect::Action('CourseController@ShowCourse');

	}

	public function DeleteLecture($courseitem_id) 
	{
		CourseItem::destroy($course_id);

		return Redirect::Action('CourseController@ShowCourse');
	}

	public function ShowAddLecture($coursesession_id)
	{
		$courseSession = CourseSession::find($coursesession_id);
		
		return View::make('teacher.addlecture', array('coure'=>$courseSession));
	}


}