<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentSpecialTable extends Migration {

	public function up()
	{
		Schema::create('Payment_Special', function(Blueprint $table) {
			$table->increments('ID_Payment_Special');
			$table->string('Detail', 20);
			$table->string('Work_date', 20);
			$table->bigInteger('Cost_perday');
		});
	}

	public function down()
	{
		Schema::drop('Payment_Special');
	}
}