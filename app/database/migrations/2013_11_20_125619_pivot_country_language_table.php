<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotCountryLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('country_language', function(Blueprint $table) {

			$table->increments('id');

			$table->integer('country_id')->unsigned()->index();
			$table->integer('language_id')->unsigned()->index();
			
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('country_language');
	}

}
