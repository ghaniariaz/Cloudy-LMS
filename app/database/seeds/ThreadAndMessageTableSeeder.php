<?php

class ThreadAndMessageTableSeeder extends Seeder {

    public function run()
    {
        DB::table('threads')->delete();
        DB::table('threadmessages')->delete();

        $faker = Faker\Factory::create();

        $users = School::find(1)->users();

        CourseSession::get()->each(function($cs) use ($faker, $users) {
        	$cs->courseItems->each(function($ci) use ($faker, $users) {
        		$count = rand(0, 3);
        		for ($i=0; $i < $count; $i++) { 
	        		$th = $ci->threads()->save(new Thread(array('name' => $faker->sentence(6), 'user_id' => $users->orderBy(DB::raw('RAND()'))->first()->id)));
	        		$count2 = rand(0, 6);
                    $tms = array();
	        		for ($j=0; $j < $count2; $j++) { 
                        $tms[] = new ThreadMessage(array('user_id'=> $users->orderBy(DB::raw('RAND()'))->first()->id, 'message'=> $faker->realText()));
                    }
        			$th->threadMessages()->saveMany($tms);
        		}
        	});
        });
    }

}