<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoryWorkTable extends Migration {

	public function up()
	{
		Schema::create('History_Work', function(Blueprint $table) {
			$table->integer('ID_member')->unsigned();
			$table->increments('HW_ID');
			$table->string('Job', 20);
			$table->string('Position', 20);
			$table->string('Experience', 20);
			$table->string('Company', 20);
		});
	}

	public function down()
	{
		Schema::drop('History_Work');
	}
}