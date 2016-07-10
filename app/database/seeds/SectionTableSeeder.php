<?php

class SectionTableSeeder extends Seeder {

    public function run()
    {
        DB::table('sections')->delete();

        $school = School::get()[0];

        $school->sections()->save(new Section(array('name' => 'A', 'passoutyear' => '2020')));
        $school->sections()->save(new Section(array('name' => 'B', 'passoutyear' => '2020')));
        $school->sections()->save(new Section(array('name' => 'A', 'passoutyear' => '2021')));
        $school->sections()->save(new Section(array('name' => 'B', 'passoutyear' => '2021')));

        $students = $school->users()->where('type', '=', 'student')->get();
        $students->each(function($st) use ($school) {
        	$st->section_id = $school->sections()->orderBy(DB::raw('RAND()'))->first()->id;
        	$st->save();
        });
    }

}