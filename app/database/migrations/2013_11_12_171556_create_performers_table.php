<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePerformersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('performers', function(Blueprint $table) {
			
			$table->increments('id');
			$table->string('name')->index();
			$table->string('name_native')->nullable();
			$table->string('sortas')->nullable();
			$table->string('slug')->nullable()->index();
			$table->string('disambig')->nullable();
			$table->text('descr');

			$table->boolean('is_group');
			$table->integer('person_id')->nullable()->unsigned()->index();

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
		Schema::drop('performers');
	}

}
