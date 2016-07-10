<?php

class GradeTypeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('gradetypes')->delete();
        DB::table('grades')->delete();

        $faker = Faker\Factory::create();

        CourseSession::get()->each(function($cs) use ($faker) {
            $count = rand(0, 5);
            $gts = array();
            for ($i=0; $i < $count; $i++) {
                $gts[] = new GradeType(array(
                                'name' => $faker->randomElement(array('Quiz', 'Test', 'OHT', 'Spot Test', 'Assignment')) + " " + $faker->randomDigit(),
                                'maxmarks' => rand(2,10) * 5
                ));
            }
            $cs->gradeTypes()->saveMany($gts);
            $sts = $cs->sclass->section->students;
            foreach ($gts as $gt) {
                $grades = array();
                $max = $gt->maxmarks;
                $sts->each(function($st) use (&$grades, $max) {
                    $grades[] = new Grade(array('marks' => rand(0, $max), 'student_id' => $st->id));
                });
                $gt->grades()->saveMany($grades);
            }
        });
    }

}