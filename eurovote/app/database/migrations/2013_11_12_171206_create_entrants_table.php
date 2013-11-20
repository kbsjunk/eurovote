<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntrantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entrants', function(Blueprint $table) {

			$table->increments('id');

			$table->integer('song_id')->nullable()->unsigned()->index();
			$table->integer('heat_id')->nullable()->unsigned()->index();	
			$table->integer('run_order')->default(0)->unsigned();
			$table->boolean('is_winner');

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
		Schema::drop('entrants');
	}

}
