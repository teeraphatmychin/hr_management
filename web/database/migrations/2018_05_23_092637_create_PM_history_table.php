<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePMHistoryTable extends Migration {

	public function up()
	{
		Schema::create('PM_history', function(Blueprint $table) {
			$table->integer('PM_ID')->unsigned();
			$table->string('Month', 20);
			$table->string('Year', 20);
			$table->enum('Value', array('succeed', 'failure'));
		});
	}

	public function down()
	{
		Schema::drop('PM_history');
	}
}