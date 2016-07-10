<?php

class AttendanceController extends BaseController {	

	public function AddAttendanceSession($coursesession_id)
	{
		$start = new DateTime();
		$start->modify(Input::get('starttime'));
		$end = new DateTime();
		$end->modify(Input::get('endtime'));
		CourseSession::find($coursesession_id)->attendanceSessions()->create(array('starttime' => $start, 'endtime' => $end));

		return Redirect::action('AttendanceController@ShowAttendanceSessions', $coursesession_id);
	}

	public function ShowAttendanceSessions ($coursesession_id)
	{
		$sessions = AttendanceSession::where('coursesession_id','=', $coursesession_id)->orderBy('created_at', 'DESC')->get();

		return View::make('teacher.asessions', array(
			'course'=>CourseSession::find($coursesession_id), 
			'sessions'=>$sessions
		));

	}

	public function DeleteAttendanceSession ($atendancesession_id)
	{
		$ats = AttendanceSession::find($atendancesession_id);
		$coursesession_id = $ats->courseSession->id;
		$ats->delete();

		return Redirect::action('AttendanceController@ShowAttendanceSessions', $coursesession_id);
	}

	public function SubmitAttendance ($attendancesession_id)
	{
		$as = AttendanceSession::find($attendancesession_id);
		$as->attendances()->update(array('present' => false));
		$pres = Input::get('present');
		if($pres) {
			foreach ($pres as $key => $att) {
				$as->attendances()->whereStudentId($att)->update(array('present' => true));
			}
		}

		return Redirect::action('AttendanceController@ShowAttendanceSessions', $as->courseSession->id);
	}

	public function EditAttendance ($attendancesession_id)
	{
		$attendancesession = AttendanceSession::find($attendancesession_id);
		$coursesession = $attendancesession->courseSession;
		$attendances = $attendancesession->attendances;

		return View::make('teacher.attendance', array(
			'course' => $coursesession,
			'session' => $attendancesession,
			'attendances' => $attendances
		));
	}

	public function TakeAttendance ($attendancesession_id)
	{
		$att = array();
		$attendancesession = AttendanceSession::find($attendancesession_id);
		$coursesession = $attendancesession->courseSession;
		$students = $coursesession->sclass->section->students->each(function($student) use(&$att, $attendancesession_id) {
			$att[] = array('student_id' => $student->id, 'attendancesession_id' => $attendancesession_id);
		});
		Attendance::insert($att);
		$attendances = $attendancesession->attendances;

		return View::make('teacher.attendance', array(
			'course' => $coursesession,
			'session' => $attendancesession,
			'attendances' => $attendances
		));
	}

	public function ShowAttendance()
	{
		$user = Auth::user();
		$data = array();
		$overall = 0;
		$css = $user->section->classes()->orderBy('created_at', 'DESC')->first()->courseSessions()->has('attendances')->get()->each(function($cs) use (&$data, $user, &$overall) {
			$ats = $cs->attendances()->whereStudentId($user->id)->get();
			$present = 0;
			foreach ($ats as $at) {
				if($at->present)
					$present++;
			}
			$value = $present/$ats->count()*100;
			$data[] = array('attendance' => $value, 'coursename' => $cs->course->name, 'teacher' => $cs->teacher->name);
			$overall += $value;
		});
		$overall = $overall/$css->count();

		return View::make('student.attendance', array(
			'attendance' => $data, 
			'overall' => $overall
		));

	}

}