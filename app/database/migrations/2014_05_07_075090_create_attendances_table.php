<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attendances', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('attendancesession_id')->unsigned();
			$table->integer('student_id')->unsigned();
			$table->boolean('present')->default(true);
			
			$table->foreign('attendancesession_id')->references('id')->on('attendancesessions')->onDelete('cascade');
			$table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('attendances');
	}

}
