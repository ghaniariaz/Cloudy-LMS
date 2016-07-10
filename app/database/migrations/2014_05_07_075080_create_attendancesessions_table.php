<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attendancesessions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('coursesession_id')->unsigned();
			$table->dateTime('starttime');
			$table->dateTime('endtime');
			$table->timestamps();
			
			$table->foreign('coursesession_id')->references('id')->on('coursesessions')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('attendancesessions');
	}

}
