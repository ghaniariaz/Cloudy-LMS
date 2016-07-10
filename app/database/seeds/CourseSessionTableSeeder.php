<?php

class CourseSessionTableSeeder extends Seeder {

    public function run()
    {
        DB::table('coursesessions')->delete();

        $sclass = Sclass::get();
        $courses = School::get()[0]->courses;
        $teachers = School::get()[0]->users()->where('type', '=', 'teacher')->get();

        $sclass[0]->courseSessions()->save(new CourseSession(array('course_id' => $courses[0]->id, 'teacher_id' => $teachers[0]->id)));
        $sclass[0]->courseSessions()->save(new CourseSession(array('course_id' => $courses[1]->id, 'teacher_id' => $teachers[1]->id)));
        $sclass[0]->courseSessions()->save(new CourseSession(array('course_id' => $courses[2]->id, 'teacher_id' => $teachers[2]->id)));
        $sclass[0]->courseSessions()->save(new CourseSession(array('course_id' => $courses[3]->id, 'teacher_id' => $teachers[0]->id)));
        $sclass[0]->courseSessions()->save(new CourseSession(array('course_id' => $courses[4]->id, 'teacher_id' => $teachers[1]->id)));
        $sclass[1]->courseSessions()->save(new CourseSession(array('course_id' => $courses[5]->id, 'teacher_id' => $teachers[2]->id)));
        $sclass[1]->courseSessions()->save(new CourseSession(array('course_id' => $courses[6]->id, 'teacher_id' => $teachers[0]->id)));
        $sclass[1]->courseSessions()->save(new CourseSession(array('course_id' => $courses[7]->id, 'teacher_id' => $teachers[1]->id)));
        $sclass[1]->courseSessions()->save(new CourseSession(array('course_id' => $courses[8]->id, 'teacher_id' => $teachers[2]->id)));
        $sclass[1]->courseSessions()->save(new CourseSession(array('course_id' => $courses[9]->id, 'teacher_id' => $teachers[0]->id)));
        $sclass[1]->courseSessions()->save(new CourseSession(array('course_id' => $courses[10]->id, 'teacher_id' => $teachers[1]->id)));
    }

}