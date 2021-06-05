<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobTable extends Migration {

	public function up()
	{
		Schema::create('Job', function(Blueprint $table) {
			$table->increments('Job_ID');
			$table->string('Job_name', 20);
			$table->integer('Salary');
			$table->integer('Salary_Parttime');
			$table->integer('Depart_ID')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Job');
	}
}