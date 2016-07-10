<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('SchoolTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('ClassTypeTableSeeder');
		$this->call('SectionTableSeeder');
		$this->call('ClassTableSeeder');
		$this->call('CourseTableSeeder');
		$this->call('CourseSessionTableSeeder');
		$this->call('FileTableSeeder');
		$this->call('NoteTableSeeder');
		$this->call('CourseItemTableSeeder');
		$this->call('ThreadAndMessageTableSeeder');
		$this->call('AttendanceSessionTableSeeder');
		$this->call('GradeTypeTableSeeder');

	}

}
