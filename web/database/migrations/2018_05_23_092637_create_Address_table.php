<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressTable extends Migration {

	public function up()
	{
		Schema::create('Address', function(Blueprint $table) {
			$table->integer('ID_member')->unsigned();
			$table->increments('ID_Address');
			$table->string('Type', 20);
			$table->string('House_No', 20);
			$table->string('Village', 20);
			$table->integer('Village_No');
			$table->string('Street', 20);
			$table->string('Sub_district_Sub_area', 20);
			$table->string('Alley_Lane');
			$table->string('District_Area', 20);
			$table->string('Province', 20);
			$table->string('Postal_Code', 20);
		});
	}

	public function down()
	{
		Schema::drop('Address');
	}
}