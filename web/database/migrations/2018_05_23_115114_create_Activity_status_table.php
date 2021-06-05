<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivityStatusTable extends Migration {

	public function up()
	{
		Schema::create('Activity_status', function(Blueprint $table) {
			$table->integer('ID_listActivity')->unsigned();
			$table->integer('ID_member');
			$table->string('status');
		});
	}

	public function down()
	{
		Schema::drop('Activity_status');
	}
}