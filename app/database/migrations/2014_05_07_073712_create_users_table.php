<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->date('dob');
			$table->string('email')->nullable();
			$table->string('username');
			$table->string('password', 100);
			$table->string('remember_token', 100)->nullable();
			$table->string('type');
			$table->integer('school_id')->unsigned();
			$table->integer('section_id')->unsigned()->nullable();
			$table->boolean('suspended');
			$table->timestamps();
			
			$table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
			$table->foreign('section_id')->references('id')->on('sections')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
