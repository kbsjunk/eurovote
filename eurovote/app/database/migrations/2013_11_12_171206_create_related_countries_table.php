<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelatedCountriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('related_countries', function(Blueprint $table) {

			$table->increments('id');

			$table->integer('country_id')->nullable()->unsigned()->index();
			$table->integer('related_country_id')->nullable()->unsigned()->index();
			$table->string('reason_type')->default('name');

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
		Schema::drop('related_countries');
	}

}
