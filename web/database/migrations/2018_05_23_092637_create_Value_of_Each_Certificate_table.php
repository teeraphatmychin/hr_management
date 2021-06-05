<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateValueOfEachCertificateTable extends Migration {

	public function up()
	{
		Schema::create('Value_of_Each_Certificate', function(Blueprint $table) {
			$table->increments('ID_Certificate');
			$table->string('Certificate_name', 100);
			$table->string('Value_Certificate', 20);
		});
	}

	public function down()
	{
		Schema::drop('Value_of_Each_Certificate');
	}
}