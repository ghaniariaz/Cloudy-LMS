<?php

class NoteTableSeeder extends Seeder {

    public function run()
    {
        DB::table('notes')->delete();

        $faker = Faker\Factory::create();

        for ($i=0; $i < 20; $i++) { 
            Note::create(array('text' => $faker->paragraph));
        }
    }

}