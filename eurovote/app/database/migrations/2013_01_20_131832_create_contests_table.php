<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contests', function(Blueprint $table) {

			$table->increments('id');
			$table->string('year')->index();
			$table->date('final_date')->nullable();

			$table->integer('city_id')->nullable()->unsigned()->index();

			$table->text('venue');
			$table->text('voting_method');

			$table->text('descr');

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
		Schema::drop('contests');
	}

}
