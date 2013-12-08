<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddEvUrl extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contests', function(Blueprint $table) {
			$table->text('ev_url');
			$table->datetime('ev_retrieved');
		});
		Schema::table('heats', function(Blueprint $table) {
			$table->text('ev_url');
			$table->datetime('ev_retrieved');
		});
		Schema::table('songs', function(Blueprint $table) {
			$table->text('ev_url');
			$table->datetime('ev_retrieved');
		});
		Schema::table('performers', function(Blueprint $table) {
			$table->text('ev_url');
			$table->datetime('ev_retrieved');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contests', function(Blueprint $table) {
			$table->dropColumn('ev_url');
			$table->dropColumn('ev_retrieved');
		});
		Schema::table('heats', function(Blueprint $table) {
			$table->dropColumn('ev_url');
			$table->dropColumn('ev_retrieved');
		});
		Schema::table('songs', function(Blueprint $table) {
			$table->dropColumn('ev_url');
			$table->dropColumn('ev_retrieved');
		});
		Schema::table('performers', function(Blueprint $table) {
			$table->dropColumn('ev_url');
			$table->dropColumn('ev_retrieved');
		});
	}

}
