<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivityDepartmentTable extends Migration {

	public function up()
	{
		Schema::create('Activity_Department', function(Blueprint $table) {
			$table->integer('Depart_ID')->unsigned();
			$table->integer('Activity_ID')->unsigned();
			$table->increments('ID_listActivity');
		});
	}

	public function down()
	{
		Schema::drop('Activity_Department');
	}
}