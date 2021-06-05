<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepartmentTable extends Migration {

	public function up()
	{
		Schema::create('Department', function(Blueprint $table) {
			$table->increments('Depart_ID');
			$table->string('Depart_name', 100);
			$table->string('Head_ID', 100)->nullable();
			$table->string('Tel', 11);
			$table->integer('Location_ID')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Department');
	}
}