<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileTable extends Migration {

	public function up()
	{
		Schema::create('Profile', function(Blueprint $table) {
			$table->increments('ID_member');
			$table->string('Firstname', 20);
			$table->string('Lastname', 20);
			$table->date('DOB');
			$table->enum('Gender', array('male', 'female'));
			$table->string('Marital_status', 20);
			$table->string('Email', 50);
			$table->string('Tel', 20);
			$table->integer('Job_ID')->unsigned();
			$table->string('Social_link', 100);
			$table->string('Work_type', 20);
			$table->string('Education', 50);
			$table->string('Photo', 255);
			$table->string('Emergency_Contact', 20);
			$table->date('Hire_day');
			$table->date('End_date')->nullable();
			$table->string('Nationality', 20);
			$table->string('Data_status', 20);
			$table->enum('User_role', array('admin', 'hr_admin', 'head', 'user'));
			$table->string('password', 255);
			$table->string('remember_token', 100)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Profile');
	}
}