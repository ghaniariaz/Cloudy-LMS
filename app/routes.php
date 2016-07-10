<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::pattern('id', '[0-9]+');

Route::get(		'/', 
	 	array(
	 	    	'uses'   => 'MainController@ShowWelcome',
	 			'before' => 'guest'
	 	));

Route::get(		'/login', 
		array(
				'uses' => 'MainController@ShowLogin',
				'before' => 'guest'
		));

Route::post(	'/login', 
		array(
				'uses' => 'MainController@Login',
				'before' => 'guest'
		));

Route::get(		'/logout', 
		array(
				'uses' => 'MainController@Logout',
				'before' => 'auth'
		));

Route::get(		'/signup', 
		array(
				'uses' => 'MainController@ShowSignup',
				'before' => 'guest'
		));

Route::post(	'/signup', 
		array(
				'uses' => 'MainController@Signup',
				'before' => 'guest'
		));

Route::get(		'/portal/courses/{id}', 
		array(
				'uses' => 'CourseController@ShowCourse',
				'before' => 'auth|teacherorstudent'
		));

Route::get(		'/portal/lectures/{id}', 
		array(
				'uses' => 'CourseController@ShowLecture',
				'before' => 'auth|teacherorstudent'
		));

Route::get(		'/portal/lectures/{id}/delete', 
		array(
				'uses' => 'CourseController@DeleteLecture',
				'before' => 'auth|teacher'
		));

Route::get(		'/portal/threads/{id}', 
		array(
				'uses' => 'DiscussionController@ViewThread',
				'before' => 'auth|teacherorstudent'
			));

Route::post(	'/portal/lectures/{id}/threads', 
		array(
				'uses' => 'DiscussionController@CreateThread',
				'before' => 'auth|teacherorstudent'
			));

Route::get(		'/portal/threads/{id}/delete', 
		array(
				'uses' => 'DiscussionController@DeleteThread',
				'before' => 'auth|teacher'
		));

Route::post(	'/portal/threads/{id}/message', 
		array(
				'uses' => 'DiscussionController@AddMessage',
				'before' => 'auth|teacherorstudent'
		));

Route::get(		'/portal/threads/message/{id}/delete', 
		array(
				'uses' => 'DiscussionController@DeleteMessage',
				'before' => 'auth|teacher'
		));

Route::get(		'/portal/courses/{id}/grades', 
		array(
				'uses' => 'GradeController@ShowGrades',
				'before' => 'auth|student'
		));

Route::get(		'/portal', 
		array(
				'uses' => 'MainController@ShowStudentDashboard',
				'before' => 'auth|student'
		));

Route::get(		'/portal/attendance', 
		array(
				'uses' => 'AttendanceController@ShowAttendance',
				'before' => 'auth|student'
		));

Route::get(		'/portal-teacher', 
		array(
				'uses' => 'MainController@ShowTeacherDashboard',
				'before' => 'auth|teacher'
		));

Route::get(		'/portal/courses/{id}/attendance', 
		array(
				'uses' => 'AttendanceController@ShowAttendanceSessions',
				'before' => 'auth|teacher'
		));

Route::post(	'/portal/courses/{id}/attendance', 
		array(
				'uses' => 'AttendanceController@AddAttendanceSession',
				'before' => 'auth|teacher'
		));

Route::get(		'/portal/attendance/{id}/delete', 
		array(
				'uses' => 'AttendanceController@DeleteAttendanceSession',
				'before' => 'auth|teacher'
		));

Route::get(		'/portal/attendance/{id}/take', 
		array(
				'uses' => 'AttendanceController@TakeAttendance',
				'before' => 'auth|teacher'
		));

Route::get(		'/portal/attendance/{id}/edit', 
		array(
				'uses' => 'AttendanceController@EditAttendance',
				'before' => 'auth|teacher'
		));

Route::post(	'/portal/attendance/{id}', 
		array(
				'uses' => 'AttendanceController@SubmitAttendance',
				'before' => 'auth|teacher'
		));

Route::get(		'/portal/courses/{id}/addlecture', 
		array(
				'uses' => 'CourseController@ShowAddLecture',
				'before' => 'auth|teacher'
		));

Route::post(	'/portal/courses/{id}/addlecture', 
		array(
				'uses' => 'CourseController@AddLecture',
				'before' => 'auth|teacher'
		));

Route::get(		'/portal/gradetypes/{id}', 
		array(
				'uses' => 'GradeController@EditGrades',
				'before' => 'auth|teacher'
		));

Route::post(	'/portal/gradetypes/{id}', 
		array(
				'uses' => 'GradeController@SubmitGrades',
				'before' => 'auth|teacher'
		));

Route::get(		'/portal/gradetypes/{id}/delete', 
		array(
				'uses' => 'GradeController@DeleteGradeType',
				'before' => 'auth|teacher'
		));

Route::get(		'/portal/courses/{id}/gradetypes', 
		array(
				'uses' => 'GradeController@ShowGradeTypes',
				'before' => 'auth|teacher'
		));

Route::post(	'/portal/courses/{id}/gradetypes', 
		array(
				'uses' => 'GradeController@AddGradeType',
				'before' => 'auth|teacher'
		));

Route::get(		'/admin', 
		array(
				'uses' => 'MainController@ShowAdminDashboard',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/users', 
		array(
				'uses' => 'UserController@ShowUsers',
				'before' => 'auth|admin'
		));

Route::post(	'/admin/users', 
		array(
				'uses' => 'UserController@AddUser',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/users/{id}', 
		array(
				'uses' => 'UserController@ShowUser',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/users/{id}/delete', 
		array(
				'uses' => 'UserController@DeleteUser',
				'before' => 'auth|admin'
		));

Route::post(	'/admin/users/{id}', 
		array(
				'uses' => 'UserController@EditUser',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/users/filter/name/{filtervalue}', 
		array(
				'uses' => 'UserController@ShowUsersByName',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/users/filter/role/{filtervalue}', 
		array(
				'uses' => 'UserController@ShowUsersByRole',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/classtypes', 
		array(
				'uses' => 'ClassTypeController@ViewClassTypes',
				'before' => 'auth|admin'
		));

Route::post(	'/admin/classtypes', 
		array(
				'uses' => 'ClassTypeController@AddClassType',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/classtypes/{id}/delete', 
		array(
				'uses' => 'ClassTypeController@DeleteClassType',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/sections', 
		array(
				'uses' => 'SectionController@ViewSections',
				'before' => 'auth|admin'
		));

Route::post(	'/admin/sections', 
		array(
				'uses' => 'SectionController@AddSection',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/sections/{id}/delete', 
		array(
				'uses' => 'SectionController@DeleteSection',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/sections/{id}', 
		array(
				'uses' => 'SectionController@ShowSectionMembers',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/sections/{section_id}/users/{user_id}/delete', 
		array(
				'uses' => 'SectionController@DeleteSectionMember',
				'before' => 'auth|admin'
		))->where(array('section_id' => '[0-9]+', 'user_id' => '[0-9]+'));

Route::get(		'/admin/classes', 
		array(
				'uses' => 'ClassController@ShowClasses',
				'before' => 'auth|admin'
		));

Route::post(	'/admin/classes', 
		array(
				'uses' => 'ClassController@AddClass',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/classes/{id}/delete', 
		array(
				'uses' => 'ClassController@DeleteClass',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/classes/{id}/courses', 
		array(
				'uses' => 'ClassController@ShowCoursesFromClass',
				'before' => 'auth|admin'
		));

Route::post(	'/admin/classes/{id}/courses', 
		array(
				'uses' => 'ClassController@AddCourseToClass',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/classes/{class_id}/courses/{course_id}', 
		array(
				'uses' => 'ClassController@DeleteCourseFromClass',
				'before' => 'auth|admin'
		))->where(array('class_id' => '[0-9]+', 'course_id' => '[0-9]+'));

Route::get(		'/admin/courses', 
		array(
				'uses' => 'CourseController@ShowCourses',
				'before' => 'auth|admin'
		));

Route::post(	'/admin/courses', 
		array(
				'uses' => 'CourseController@AddCourse',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/courses/{id}/delete', 
		array(
				'uses' => 'CourseController@DeleteCourses',
				'before' => 'auth|admin'
		));

Route::get(		'/admin/settings', 
		array(
				'uses' => 'SchoolController@EditSchool',
				'before' => 'auth|admin'
		));

Route::post(	'/admin/settings', 
		array(
				'uses' => 'SchoolController@UpdateSchool',
				'before' => 'auth|admin'
		));

Route::get(		'/root/schools', 
		array(
				'uses' => 'SchoolController@ViewSchools',
				'before' => 'auth|root'
		));

Route::get(		'/root/schools/{id}/delete', 
		array(
				'uses' => 'SchoolController@DeleteSchool',
				'before' => 'auth|root'
		));

Route::get(		'/root/schools/{id}/suspend', 
		array(
				'uses' => 'SchoolController@SuspendSchool',
				'before' => 'auth|root'
		));

Route::get(		'/root/schools/{id}/unsuspend', 
		array(
				'uses' => 'SchoolController@UnSuspendSchool',
				'before' => 'auth|root'
		));
