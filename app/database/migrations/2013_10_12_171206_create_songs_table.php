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
			$table->string('name')->index();
			$table->string('name_native')->nullable();
			$table->string('sortas')->nullable();
			$table->string('slug')->nullable()->index();
			$table->string('disambig')->nullable();
			$table->text('descr');

			$table->integer('country_id')->nullable()->unsigned()->index();
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
		Schema::drop('songs');
	}

}
