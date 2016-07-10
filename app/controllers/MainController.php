<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class MainController extends BaseController
{
	//defines the number of 'recent' items returned
	private	$recentsCount = 10;


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





	public function ShowWelcome()
	{
		return View::make('main.welcome');
	}



	public function ShowLogin()
	{
		return View::make('main.login');
	}



	public function Login()
	{
		//get input arguments
		$username = Input::get('username');
		$password = Input::get('password');

		//search for username and get model
		$model = User::whereUsername($username)->wherePassword($password)->first();

		//if entered password is correct
		if($model)
		{
			// if (Auth::attempt(array('username' => $username, 'password' => $password)))
			if (Auth::loginUsingId($model->id))
			{
				if($model->type == 'student')
					return Redirect::Action('MainController@ShowStudentDashboard');

				else if($model->type == 'teacher')
					return Redirect::Action('MainController@ShowTeacherDashboard');

				else if($model->type == 'admin')
					return Redirect::Action('MainController@ShowAdminDashboard');
			} else {
				return Redirect::to('login?fail=1');
			}
		} else {
			return Redirect::to('login?fail=1');
		}

		//to-do: add condition for password being wrong
	}

	public function Logout()
	{
		Auth::logout();
		return Redirect::Action('MainController@ShowLogin');
	}

	public function ShowSignup()
	{
		return View::make('main.signup');
	}



	public function Signup()
	{
		//create models
		$userModel = new User();
		$schoolModel = new School();

		//get input about school
		$logo = Input::get('logo');
		$schoolName = Input::get('schoolname');

		//get input about user
		$adminDob = Input::get('admindob');
		$adminName = Input::get('adminname');
		$adminMail = Input::get('adminmail');
		$adminUsername = Input::get('adminusername');
		$adminPassword = Input::get('adminpassword');


		//to-do: data validation


		//save school information
		$schoolModel->name = $schoolName;
		$schoolModel->logo = $logo;
		$schoolModel->save();

		//save user information
		$userModel->dob = $adminDob;
		$userModel->name = $adminName;
		$userModel->email = $adminMail;
		$userModel->username = $adminUsername;
		$userModel->password = $adminPassword;
		$userModel->save();

		return Redirect::Action('MainController@ShowAdminDashboard');
	}



	public function ShowStudentDashboard()
	{
		$user = Auth::user();

		//get courses
		$section = $user->section_id;
		$class = Sclass::where('section_id', '=', $section)->orderBy('created_at', 'DESC')->first();
		$courses = CourseSession::where('class_id', '=', $class->id)->get();


		//get overall attendance
		$allAttendances = Attendance::where('student_id', '=', $user->id)->get();

		$total = 0;
		$present = 0;

		foreach($allAttendances as $attendance)
		{
			if($attendance->present)
				$present++;

			$total++;
		}

		$overallAttendance = $present/$total * 100;


		//get recent lectures
		$allLectures = $this->getAllCourseitems($courses);
		// $recentLectures = array_slice($allLectures, 0, $this->recentsCount);
		$recentLectures = $class->courseItems()->take($this->recentsCount)->get();

		//get recent grades
		$recentGrades = Grade::where('student_id', '=', $user->id)->orderBy('updated_at', 'DESC')->take($this->recentsCount)->get();

		//get recent threads
		// $recentThreads = $this->getThreads($allLectures, $this->recentsCount);
		$recentThreads = Thread::with('user')
							->join('courseitems', 'courseitems.id', '=', 'threads.courseitem_id')
							->join('coursesessions', 'courseitems.coursesession_id', '=', 'coursesessions.id')
							->where('coursesessions.class_id', '=', $class->id)
							->orderBy('threads.updated_at', 'DESC')
							->take($this->recentsCount)
							->get();

		return View::make('student.dashboard', array(
			'courses'=>$courses, 
			'overallattendance'=>$overallAttendance, 
			'recentlectures'=>$recentLectures, 
			'recentgrades'=>$recentGrades, 
			'recentthreads'=>$recentThreads
		));
	}



	public function ShowTeacherDashboard()
	{		
		$courses = CourseSession::where('teacher_id', '=', Auth::user()->id)->get();
		$recentLectures = array();
		$courses->each(function($cs) use (&$recentLectures) {
			$cs->courseItems->each(function($ci) use (&$recentLectures) {
				$recentLectures[] = $ci;
			});
		});
		$recentThreads = array();
		foreach ($recentLectures as $value) {
			$value->threads->each(function($th) use(&$recentThreads) {
				$recentThreads[] = $th;
			});
		}
		//get recent lectures
		// $allLectures = $this->getAllCourseitems($courses);
		// $recentLectures = array_slice($allLectures, 0, $this->recentsCount);
		// $recentLectures = CourseItem::with('courseSession')
		// 					->join('coursesessions', 'courseitems.coursesession_id', '=', 'coursesessions.id')
		// 					->where('coursesessions.teacher_id', '=', $Auth::User()->id)
		// 					->orderBy('courseitems.created_at', 'DESC')
		// 					->take($this->recentsCount)
		// 					->get();

		//get recent grades
		//GradeTypes has no created_at or updated_at columns

		//get recent threads
		// $recentThreads = $this->getThreads($allLectures, $this->recentsCount);
		// $recentThreads = Thread::with('user')
		// 					->join('courseitems', 'courseitems.id', '=', 'threads.courseitem_id')
		// 					->join('coursesessions', 'courseitems.coursesession_id', '=', 'coursesessions.id')
		// 					->where('coursesessions.teacher_id', '=', $Auth::User()->id)
		// 					->orderBy('threads.updated_at', 'DESC')
		// 					->take($this->recentsCount)
		// 					->get();

		return View::make('teacher.dashboard', array(
			'courses'=>$courses,
			'recentlectures'=>$recentLectures,
			// // 'recentgrades'=>$recentGrades, 
			'recentthreads'=>$recentThreads
			// 'recentthreads'=>array()
		));
	}



	public function ShowAdminDashboard()
	{
		$school = School::findOrFail(Auth::user()->school_id);

		//throw exception if school not found
		App::error(function(ModelNotFoundException $e)
		{
    		return Response::make('Not Found', 404);
		});

		//the following need to be tested
		$studentcount = $school->users()->whereType('student')->count();
		$teachercount = $school->users()->whereType('teacher')->count();
		$sectioncount = $school->sections()->count();
		$coursecount = Course::where('school_id', '=', $school->id)->count();

		return View::make('admin.welcome', array(
			'school'=>$school,
			'studentcount'=>$studentcount, 
			'teachercount'=>$teachercount, 
			'coursecount'=>$coursecount,
			'sectioncount'=>$sectioncount
		));
	}
}
