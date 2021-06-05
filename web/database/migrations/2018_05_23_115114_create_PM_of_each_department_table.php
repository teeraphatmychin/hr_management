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
			$table->integer('Month');
			$table->integer('Year');
			$table->string('Value', 190)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('PM_of_each_department');
	}
}