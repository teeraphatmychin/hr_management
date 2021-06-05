<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePerformanceMeasurementTable extends Migration {

	public function up()
	{
		Schema::create('Performance_measurement', function(Blueprint $table) {
			$table->increments('KPI_Code');
			$table->string('Indicators', 20);
			$table->string('MC', 20);
		});
	}

	public function down()
	{
		Schema::drop('Performance_measurement');
	}
}