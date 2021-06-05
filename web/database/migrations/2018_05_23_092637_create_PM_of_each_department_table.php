<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePMOfEachDepartmentTable extends Migration {

	public function up()
	{
		Schema::create('PM_of_each_department', function(Blueprint $table) {
			$table->increments('PM_ID');
			$table->integer('Depart_ID')->unsigned();
			$table->integer('KPI_CODE')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('PM_of_each_department');
	}
}