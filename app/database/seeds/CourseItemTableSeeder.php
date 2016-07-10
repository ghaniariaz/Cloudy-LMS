<?php

class CourseItemTableSeeder extends Seeder {

    public function run()
    {
        DB::table('courseitems')->delete();

        $faker = Faker\Factory::create();
        $notes = Note::get();
        $files = Sfile::get();
 		$coursesession = CourseSession::get();

 		$i = 0;

 		foreach ($notes as $value) {
	        CourseItem::create(array('name' => $faker->sentence(4), 'brief' => $faker->sentence(30), 'content_id' => $value->id, 'content_type' => 'Note', 'coursesession_id' => $coursesession[($i++)%$coursesession->count()]->id));
 		}
 		foreach ($files as $value) {
	        CourseItem::create(array('name' => $faker->sentence(4), 'brief' => $faker->sentence(30), 'content_id' => $value->id, 'content_type' => 'File', 'coursesession_id' => $coursesession[($i++)%$coursesession->count()]->id));
 		}
    }

}