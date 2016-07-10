<?php

class ClassTypeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('classtypes')->delete();

        $school = School::get()[0];

        $school->classTypes()->save(new ClassType(array('name' => 'Primary 1')));
        $school->classTypes()->save(new ClassType(array('name' => 'Primary 2')));
        $school->classTypes()->save(new ClassType(array('name' => 'Primary 3')));
        $school->classTypes()->save(new ClassType(array('name' => 'Primary 4')));
        $school->classTypes()->save(new ClassType(array('name' => 'Primary 5')));
        $school->classTypes()->save(new ClassType(array('name' => 'Secondary 1')));
        $school->classTypes()->save(new ClassType(array('name' => 'Secondary 2')));
        $school->classTypes()->save(new ClassType(array('name' => 'Secondary 3')));
        $school->classTypes()->save(new ClassType(array('name' => 'Senior 1')));
        $school->classTypes()->save(new ClassType(array('name' => 'Senior 2')));
        $school->classTypes()->save(new ClassType(array('name' => 'Senior 3')));
    }

}