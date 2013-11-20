<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHeatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('heats', function(Blueprint $table) {

			$table->increments('id');
			$table->date('date')->nullable();

			$table->integer('semi_type')->default(10)->unsigned();
			$table->integer('contest_id')->nullable()->unsigned()->index();

			$table->softDeletes();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('heats');
	}

}
