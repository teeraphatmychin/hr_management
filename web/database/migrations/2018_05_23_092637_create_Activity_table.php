<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivityTable extends Migration {

	public function up()
	{
		Schema::create('Activity', function(Blueprint $table) {
			$table->increments('Activity_ID');
			$table->string('Activity_name', 20);
			$table->string('Objective', 20);
			$table->string('Type', 20);
			$table->string('Detail', 20);
			$table->date('Start_date');
			$table->date('End_date');
		});
	}

	public function down()
	{
		Schema::drop('Activity');
	}
}