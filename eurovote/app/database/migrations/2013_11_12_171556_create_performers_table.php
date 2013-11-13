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
			$table->string('name');
			$table->string('sortas')->nullable();
			$table->string('slug')->nullable();
			$table->text('descr');
			$table->string('disambig')->nullable();
			$table->boolean('is_group');
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
