<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $faker = Faker\Factory::create();
        $schools = School::get();

        User::create(array('name' => 'Mehdi Raza', 'suspended' => false, 'dob' => '8-2-1993', 'email' => 'mehdi991@gmail.com', 'username' => 'mehdi', 'password' => 'asd123', 'type' => 'admin', 'school_id' => $schools[0]->id));
        User::create(array('name' => 'Jawad Khan', 'suspended' => false, 'dob' => '8-2-1980', 'email' => 'jawad@gmail.com', 'username' => 'jawad', 'password' => 'asd123', 'type' => 'admin', 'school_id' => $schools[1]->id));

        $count = rand(150, 200);
        for ($i=0; $i < $count; $i++) { 
            User::create(array(
                'name' => $faker->name(), 
                'suspended' => $faker->boolean(5), 
                'dob' => $faker->dateTimeBetween('-16 years', '-6 years'), 
                'email' => $faker->email(), 
                'username' => $faker->userName(), 
                'password' => $faker->word(), 
                'type' => 'student', 
                'school_id' => $schools[0]->id)
            );
        }
        // User::create(array('name' => 'Muiz Gee', 'suspended' => false, 'dob' => '8-2-1995', 'email' => 'muiz@gmail.com', 'username' => 'muiz', 'password' => 'asd123', 'type' => 'student', 'school_id' => $schools[0]->id));
        // User::create(array('name' => 'Kamran Akmal', 'suspended' => false, 'dob' => '8-2-1994', 'email' => 'kamran@gmail.com', 'username' => 'kamran', 'password' => 'asd123', 'type' => 'student', 'school_id' => $schools[0]->id));
        // User::create(array('name' => 'Umar Akmal', 'suspended' => false, 'dob' => '10-6-1994', 'email' => 'umar@gmail.com', 'username' => 'umar', 'password' => 'asd123', 'type' => 'student', 'school_id' => $schools[0]->id));
        // User::create(array('name' => 'Faizan Mirza', 'suspended' => false, 'dob' => '10-6-1996', 'email' => 'faizan@gmail.com', 'username' => 'faizan', 'password' => 'asd123', 'type' => 'student', 'school_id' => $schools[0]->id));
        // User::create(array('name' => 'Ehtisham Haider', 'suspended' => false, 'dob' => '10-6-1990', 'email' => 'ehtisham@gmail.com', 'username' => 'ehtisham', 'password' => 'asd123', 'type' => 'student', 'school_id' => $schools[0]->id));
        // User::create(array('name' => 'Akbar Mirza', 'suspended' => false, 'dob' => '10-6-1993', 'email' => 'akbar@gmail.com', 'username' => 'akbar', 'password' => 'asd123', 'type' => 'student', 'school_id' => $schools[0]->id));
        // User::create(array('name' => 'Rabia Afridi', 'suspended' => false, 'dob' => '12-7-1993', 'email' => 'rabia@gmail.com', 'username' => 'rabia', 'password' => 'asd123', 'type' => 'student', 'school_id' => $schools[0]->id));
        // User::create(array('name' => 'Saba Tanoli', 'suspended' => false, 'dob' => '5-4-1995', 'email' => 'saba@gmail.com', 'username' => 'saba', 'password' => 'asd123', 'type' => 'student', 'school_id' => $schools[0]->id));
        // User::create(array('name' => 'Sabahat Atcha', 'suspended' => false, 'dob' => '1-2-1997', 'email' => 'sabahat@gmail.com', 'username' => 'sabahat', 'password' => 'asd123', 'type' => 'student', 'school_id' => $schools[0]->id));
        // User::create(array('name' => 'Ghazala Babar', 'suspended' => false, 'dob' => '1-2-1997', 'email' => 'ghazala@gmail.com', 'username' => 'ghazala', 'password' => 'asd123', 'type' => 'student', 'school_id' => $schools[0]->id));
        // User::create(array('name' => 'Gulab Burki', 'suspended' => false, 'dob' => '1-2-1997', 'email' => 'gulab@gmail.com', 'username' => 'gulab', 'password' => 'asd123', 'type' => 'student', 'school_id' => $schools[0]->id));

        User::create(array('name' => 'Abida Khan', 'suspended' => false, 'dob' => '10-6-1987', 'email' => 'abida@gmail.com', 'username' => 'abida', 'password' => 'asd123', 'type' => 'teacher', 'school_id' => $schools[0]->id));
        User::create(array('name' => 'Naila Abidi', 'suspended' => false, 'dob' => '10-6-1982', 'email' => 'naila@gmail.com', 'username' => 'naila', 'password' => 'asd123', 'type' => 'teacher', 'school_id' => $schools[0]->id));
        User::create(array('name' => 'Yasmin Malik', 'suspended' => false, 'dob' => '10-6-1975', 'email' => 'yasmin@gmail.com', 'username' => 'yasmin', 'password' => 'asd123', 'type' => 'teacher', 'school_id' => $schools[0]->id));
    }

}