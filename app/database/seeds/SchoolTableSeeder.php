<?php

class SchoolTableSeeder extends Seeder {

    public function run()
    {
        DB::table('schools')->delete();

        School::create(array('name' => 'Beaconhouse School System', 'suspended' => false));
        School::create(array('name' => 'City School', 'suspended' => false));
        School::create(array('name' => 'Aitchison College', 'suspended' => true));
    }

}