<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasstypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classtypes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('school_id')->unsigned();

			$table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('classtypes');
	}

}
