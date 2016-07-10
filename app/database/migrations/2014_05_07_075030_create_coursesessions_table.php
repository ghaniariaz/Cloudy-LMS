<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coursesessions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('class_id')->unsigned();
			$table->integer('course_id')->unsigned();
			$table->integer('teacher_id')->unsigned()->nullable();
			$table->timestamps();
			
			$table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
			$table->foreign('teacher_id')->references('id')->on('users')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('coursesessions');
	}

}
