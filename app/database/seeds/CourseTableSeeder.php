<?php

class CourseTableSeeder extends Seeder {

    public function run()
    {
        DB::table('courses')->delete();

        $school = School::get()[0];

        $school->courses()->save(new Course(array('name' => 'First Grade Science')));
        $school->courses()->save(new Course(array('name' => 'First Grade Mathematics')));
        $school->courses()->save(new Course(array('name' => 'First Grade Geography')));
        $school->courses()->save(new Course(array('name' => 'First Grade General Knowledge')));
        $school->courses()->save(new Course(array('name' => 'First Grade Arts')));
        $school->courses()->save(new Course(array('name' => 'Second Grade Science')));
        $school->courses()->save(new Course(array('name' => 'Second Grade Mathematics')));
        $school->courses()->save(new Course(array('name' => 'Second Grade Islamiat')));
        $school->courses()->save(new Course(array('name' => 'Second Grade History')));
        $school->courses()->save(new Course(array('name' => 'Second Grade Geography')));
        $school->courses()->save(new Course(array('name' => 'Second Grade Music')));
    }

}