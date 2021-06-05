<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEducationHistoryTable extends Migration {

	public function up()
	{
		Schema::create('Education_history', function(Blueprint $table) {
			$table->integer('ID_mamber')->unsigned();
			$table->integer('ID_Education');
			$table->string('certificate');
			$table->string('Academy');
		});
	}

	public function down()
	{
		Schema::drop('Education_history');
	}
}