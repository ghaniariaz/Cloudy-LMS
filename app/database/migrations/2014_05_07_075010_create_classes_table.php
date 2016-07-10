<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('classtype_id')->unsigned();
			$table->integer('section_id')->unsigned();
			$table->integer('classteacher_id')->unsigned()->nullable();
			$table->timestamps();
			
			$table->foreign('classtype_id')->references('id')->on('classtypes');
			$table->foreign('section_id')->references('id')->on('sections');
			$table->foreign('classteacher_id')->references('id')->on('users')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('classes');
	}

}
