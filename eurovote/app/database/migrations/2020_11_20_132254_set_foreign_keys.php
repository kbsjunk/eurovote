<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class SetForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::table('contests', function($table)
		{
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
		});
		// Schema::table('countries', function($table)
		// {
			
		// });
		Schema::table('songs', function($table)
		{
			$table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
			$table->foreign('contest_id')->references('id')->on('contests')->onDelete('cascade');
		});
		Schema::table('entrants', function($table)
		{
			$table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
			$table->foreign('heat_id')->references('id')->on('heats')->onDelete('cascade');
		});
		Schema::table('heats', function($table)
		{
			$table->foreign('contest_id')->references('id')->on('contests')->onDelete('cascade');
		});
		Schema::table('related_countries', function($table)
		{
			$table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
			$table->foreign('related_country_id')->references('id')->on('countries')->onDelete('cascade');
		});
		Schema::table('performers', function($table)
		{
			$table->foreign('person_id')->references('id')->on('persons');
		});
		Schema::table('cities', function($table)
		{
			$table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
		});
		// Schema::table('languages', function($table)
		// {
			
		// });
		Schema::table('country_language', function($table)
		{
			$table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
			$table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
		});
		Schema::table('song_language', function($table)
		{
			$table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
			$table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
		});

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		Schema::table('contests', function($table)
		{
			$table->dropForeign('contests_city_id_foreign');
		});
		// Schema::table('countries', function($table)
		// {

		// });
		Schema::table('songs', function($table)
		{
			$table->dropForeign('songs_country_id_foreign');
			$table->dropForeign('songs_contest_id_foreign');
		});
		Schema::table('entrants', function($table)
		{
			$table->dropForeign('entrants_song_id_foreign');
			$table->dropForeign('entrants_heat_id_foreign');
		});
		Schema::table('heats', function($table)
		{
			$table->dropForeign('heats_contest_id_foreign');
		});
		Schema::table('related_countries', function($table)
		{
			$table->dropForeign('related_countries_country_id_foreign');
			$table->dropForeign('related_countries_related_country_id_foreign');
		});
		Schema::table('performers', function($table)
		{
			$table->dropForeign('performers_person_id_foreign');
		});
		Schema::table('cities', function($table)
		{
			$table->dropForeign('cities_country_id_foreign');
		});
		// Schema::table('languages', function($table)
		// {

		// });
		Schema::table('country_language', function($table)
		{
			$table->dropForeign('country_language_country_id_foreign');
			$table->dropForeign('country_language_language_id_foreign');
		});
		Schema::table('song_language', function($table)
		{
			$table->dropForeign('song_language_song_id_foreign');
			$table->dropForeign('song_language_language_id_foreign');
		});
	}

}
