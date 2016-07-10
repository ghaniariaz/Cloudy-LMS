<?php

class AttendanceSessionTableSeeder extends Seeder {

    public function run()
    {
        DB::table('attendances')->delete();
        DB::table('attendancesessions')->delete();

        $faker = Faker\Factory::create();

        CourseSession::get()->each(function($cs) use ($faker) {
            $count = rand(0, 3);
            for ($i=0; $i < $count; $i++) { 
                $interval = new DateInterval('PT1H');
                $start = $faker->dateTimeThisYear();
                $as = $cs->attendanceSessions()->save(new AttendanceSession(array('starttime' => $start, 'endtime' => $start->add($interval))));
                $cs->sclass->section->students->each(function($us) use ($as, $faker) {
                    $as->attendances()->save(new Attendance(array('student_id' => $us->id, 'present' => $faker->boolean(80))));
                });
            }
        });
    }

}