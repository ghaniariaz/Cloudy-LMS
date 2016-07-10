<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseitemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courseitems', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('brief')->nullable();
			$table->morphs('content');
			$table->integer('coursesession_id')->unsigned();
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
		Schema::drop('courseitems');
	}

}
