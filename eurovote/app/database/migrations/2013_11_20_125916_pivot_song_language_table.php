<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotSongLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('song_language', function(Blueprint $table) {

			$table->increments('id');

			$table->integer('language_id')->unsigned()->default(1)->index();
			$table->integer('song_id')->unsigned()->index();

			$table->boolean('is_primary')->default(true);
			$table->boolean('is_native')->default(true);
			
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('song_language');
	}

}
