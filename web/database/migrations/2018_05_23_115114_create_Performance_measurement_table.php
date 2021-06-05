<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePerformanceMeasurementTable extends Migration {

	public function up()
	{
		Schema::create('Performance_measurement', function(Blueprint $table) {
			$table->increments('KPI_Code');
			$table->string('Key_Result_Areas', 190);
			$table->string('Key_Performance_Indicators', 190);
			$table->string('Weight_of_KPIs', 190);
			$table->string('Target', 190)->nullable();
			$table->integer('Actual')->nullable();
			$table->integer('Score')->nullable();
			$table->integer('Final_score')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Performance_measurement');
	}
}