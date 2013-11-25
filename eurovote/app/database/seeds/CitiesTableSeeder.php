<?php

class CitiesTableSeeder extends Seeder {

	public function run() {
	// Uncomment the below to wipe the table clean before populating
	// DB::table('cities')->truncate();
		$cities = array(
			array('id' => '1','name' => 'Lugano','disambig' => NULL,'name_native' => NULL,'country_id' => '10'),
			array('id' => '2','name' => 'Frankfurt am Main','disambig' => NULL,'name_native' => NULL,'country_id' => '14'),
			array('id' => '3','name' => 'Hilversum','disambig' => NULL,'name_native' => NULL,'country_id' => '41'),
			array('id' => '4','name' => 'Cannes','disambig' => NULL,'name_native' => NULL,'country_id' => '19'),
			array('id' => '5','name' => 'London','disambig' => NULL,'name_native' => NULL,'country_id' => '20'),
			array('id' => '6','name' => 'Luxembourg','disambig' => NULL,'name_native' => 'Lëtzebuerg','country_id' => '33'),
			array('id' => '7','name' => 'Copenhagen','disambig' => NULL,'name_native' => 'København','country_id' => '15'),
			array('id' => '8','name' => 'Naples','disambig' => NULL,'name_native' => 'Napoli','country_id' => '28'),
			array('id' => '9','name' => 'Vienna','disambig' => NULL,'name_native' => NULL,'country_id' => '4'),
			array('id' => '10','name' => 'Madrid','disambig' => NULL,'name_native' => NULL,'country_id' => '17'),
			array('id' => '11','name' => 'Amsterdam','disambig' => NULL,'name_native' => NULL,'country_id' => '41'),
			array('id' => '12','name' => 'Dublin','disambig' => NULL,'name_native' => NULL,'country_id' => '25'),
			array('id' => '13','name' => 'Edinburgh','disambig' => NULL,'name_native' => NULL,'country_id' => '20'),
			array('id' => '14','name' => 'Brighton','disambig' => NULL,'name_native' => NULL,'country_id' => '20'),
			array('id' => '15','name' => 'Stockholm','disambig' => NULL,'name_native' => NULL,'country_id' => '49'),
			array('id' => '16','name' => 'The Hague','disambig' => NULL,'name_native' => 'Den Haag','country_id' => '41'),
			array('id' => '17','name' => 'Paris','disambig' => NULL,'name_native' => NULL,'country_id' => '19'),
			array('id' => '18','name' => 'Jerusalem','disambig' => NULL,'name_native' => 'ירושלים','country_id' => '26'),
			array('id' => '19','name' => 'Harrogate','disambig' => NULL,'name_native' => NULL,'country_id' => '20'),
			array('id' => '20','name' => 'Munich','disambig' => NULL,'name_native' => 'München','country_id' => '14'),
			array('id' => '21','name' => 'Gothenburg','disambig' => NULL,'name_native' => 'Göteborg','country_id' => '49'),
			array('id' => '22','name' => 'Bergen','disambig' => NULL,'name_native' => NULL,'country_id' => '42'),
			array('id' => '23','name' => 'Brussels','disambig' => NULL,'name_native' => 'Brussel|Bruxelles|Brüssel','country_id' => '7'),
			array('id' => '24','name' => 'Lausanne','disambig' => NULL,'name_native' => NULL,'country_id' => '10'),
			array('id' => '25','name' => 'Zagreb','disambig' => 'Yugoslavia','name_native' => NULL,'country_id' => '57'),
			array('id' => '26','name' => 'Rome','disambig' => NULL,'name_native' => 'Roma','country_id' => '28'),
			array('id' => '27','name' => 'Malmö','disambig' => NULL,'name_native' => NULL,'country_id' => '49'),
			array('id' => '28','name' => 'Millstreet','disambig' => NULL,'name_native' => NULL,'country_id' => '25'),
			array('id' => '29','name' => 'Oslo','disambig' => NULL,'name_native' => NULL,'country_id' => '42'),
			array('id' => '30','name' => 'Birmingham','disambig' => NULL,'name_native' => NULL,'country_id' => '20'),
			array('id' => '31','name' => 'Tallinn','disambig' => NULL,'name_native' => NULL,'country_id' => '16'),
			array('id' => '32','name' => 'Riga','disambig' => NULL,'name_native' => NULL,'country_id' => '34'),
			array('id' => '33','name' => 'Istanbul','disambig' => NULL,'name_native' => 'İstanbul','country_id' => '55'),
			array('id' => '34','name' => 'Kiev','disambig' => NULL,'name_native' => 'Київ','country_id' => '56'),
			array('id' => '35','name' => 'Athens','disambig' => NULL,'name_native' => NULL,'country_id' => '22'),
			array('id' => '36','name' => 'Helsinki','disambig' => NULL,'name_native' => NULL,'country_id' => '18'),
			array('id' => '37','name' => 'Belgrade','disambig' => 'Serbia','name_native' => 'Beograd|Београд','country_id' => '47'),
			array('id' => '38','name' => 'Moscow','disambig' => NULL,'name_native' => 'Москва','country_id' => '48'),
			array('id' => '39','name' => 'Düsseldorf','disambig' => NULL,'name_native' => NULL,'country_id' => '14'),
			array('id' => '40','name' => 'Baku','disambig' => NULL,'name_native' => 'Bakı','country_id' => '5'),
			array('id' => '41','name' => 'Zagreb','disambig' => 'Croatia','name_native' => NULL,'country_id' => '23'),
			array('id' => '42','name' => 'Belgrade','disambig' => 'Serbia and Montenegro','name_native' => NULL,'country_id' => '11')
			);

// Uncomment the below to run the seeder
DB::table('cities')->insert($cities);
}

}
