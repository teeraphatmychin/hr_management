<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCertificateTable extends Migration {

	public function up()
	{
		Schema::create('Certificate', function(Blueprint $table) {
			$table->integer('ID_Certificate')->unsigned();
			$table->integer('ID_member')->unsigned();
			$table->string('Total_value_Certificate', 20);
		});
	}

	public function down()
	{
		Schema::drop('Certificate');
	}
}