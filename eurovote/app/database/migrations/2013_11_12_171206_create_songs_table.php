<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSongsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('songs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('sortas')->nullable();
			$table->string('slug')->nullable();
			$table->string('disambig')->nullable();
			$table->integer('country_id')->nullable();
			$table->integer('contest_id')->nullable();
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
		Schema::drop('songs');
	}

}
