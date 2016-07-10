<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradetypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gradetypes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->float('maxmarks');
			$table->integer('coursesession_id')->unsigned();

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
		Schema::drop('gradetypes');
	}

}
