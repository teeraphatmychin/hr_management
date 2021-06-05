<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationTable extends Migration {

	public function up()
	{
		Schema::create('Location', function(Blueprint $table) {
			$table->increments('Location_ID');
			$table->string('Location_name', 20);
			$table->string('Apartment', 20);
			$table->string('Building', 20);
			$table->string('Floor', 20);
			$table->string('House_No', 20);
			$table->string('Village', 20);
			$table->integer('Village_No');
			$table->string('Street', 20);
			$table->string('Sub_district_Sub_area', 20);
			$table->string('Alley_Lane', 20);
			$table->string('District_Area', 20);
			$table->string('Province', 20);
			$table->string('Postal_Code', 20);
			$table->string('Tel', 11);
			$table->integer('Tax');
		});
	}

	public function down()
	{
		Schema::drop('Location');
	}
}