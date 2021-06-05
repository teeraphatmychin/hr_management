<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransectionPeymentTable extends Migration {

	public function up()
	{
		Schema::create('Transection_Peyment', function(Blueprint $table) {
			$table->increments('ID_list');
			$table->integer('ID_member')->unsigned();
			$table->bigInteger('Salary');
			$table->bigInteger('Total_Value_Skill');
			$table->date('Date_Pay');
			$table->bigInteger('Value_OT_total');
			$table->bigInteger('Value_Bonus_total');
			$table->integer('ID_payment_special')->unsigned();
			$table->bigInteger('ALL_Total');
		});
	}

	public function down()
	{
		Schema::drop('Transection_Peyment');
	}
}