<?php

class CountriesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('countries')->truncate();

		$countries = array(
			array('id' => '1','name' => 'Andorra','name_native' => NULL,'code' => 'ad'),
			array('id' => '2','name' => 'Albania','name_native' => 'Shqipëria','code' => 'al'),
			array('id' => '3','name' => 'Armenia','name_native' => 'Հայաստան','code' => 'am'),
			array('id' => '4','name' => 'Austria','name_native' => 'Österreich','code' => 'at'),
			array('id' => '5','name' => 'Azerbaijan','name_native' => 'Azərbaycan','code' => 'az'),
			array('id' => '6','name' => 'Bosnia and Herzegovina','name_native' => 'Bosna i Hercegovina|Босна и Херцеговина','code' => 'ba'),
			array('id' => '7','name' => 'Belgium','name_native' => 'België|Belgique|Belgien','code' => 'be'),
			array('id' => '8','name' => 'Bulgaria','name_native' => 'България','code' => 'bg'),
			array('id' => '9','name' => 'Belarus','name_native' => 'Беларусь','code' => 'by'),
			array('id' => '10','name' => 'Switzerland','name_native' => 'Schweiz|Suisse|Svizzera','code' => 'ch'),
			array('id' => '11','name' => 'Serbia and Montenegro','name_native' => NULL,'code' => 'cs'),//'is_former'=>true,
			array('id' => '12','name' => 'Cyprus','name_native' => 'Κύπρος|Kıbrıs','code' => 'cy'),
			array('id' => '13','name' => 'Czech Republic','name_native' => 'Česká republika','code' => 'cz'),
			array('id' => '14','name' => 'Germany','name_native' => 'Deutschland','code' => 'de'),
			array('id' => '15','name' => 'Denmark','name_native' => 'Danmark','code' => 'dk'),
			array('id' => '16','name' => 'Estonia','name_native' => 'Eesti','code' => 'ee'),
			array('id' => '17','name' => 'Spain','name_native' => 'España','code' => 'es'),
			array('id' => '18','name' => 'Finland','name_native' => 'Suomi','code' => 'fi'),
			array('id' => '19','name' => 'France','name_native' => NULL,'code' => 'fr'),
			array('id' => '20','name' => 'United Kingdom','name_native' => NULL,'code' => 'gb'),
			array('id' => '21','name' => 'Georgia','name_native' => 'საქართველო','code' => 'ge'),
			array('id' => '22','name' => 'Greece','name_native' => 'Ελλάδα','code' => 'gr'),
			array('id' => '23','name' => 'Croatia','name_native' => 'Hrvatska','code' => 'hr'),
			array('id' => '24','name' => 'Hungary','name_native' => 'Magyarország','code' => 'hu'),
			array('id' => '25','name' => 'Ireland','name_native' => 'Éire','code' => 'ie'),
			array('id' => '26','name' => 'Israel','name_native' => 'ישראל|إسرائيل','code' => 'il'),
			array('id' => '27','name' => 'Iceland','name_native' => 'Ísland','code' => 'is'),
			array('id' => '28','name' => 'Italy','name_native' => 'Italia','code' => 'it'),
			array('id' => '29','name' => 'Kosovo','name_native' => 'Kosova|Косово','code' => 'ko'),
			array('id' => '30','name' => 'Lebanon','name_native' => 'لبنان','code' => 'lb'),
			array('id' => '31','name' => 'Liechtenstein','name_native' => NULL,'code' => 'li'),
			array('id' => '32','name' => 'Lithuania','name_native' => 'Lietuva','code' => 'lt'),
			array('id' => '33','name' => 'Luxembourg','name_native' => 'Lëtzebuerg|Luxemburg|Luxembourg','code' => 'lu'),
			array('id' => '34','name' => 'Latvia','name_native' => 'Latvija','code' => 'lv'),
			array('id' => '35','name' => 'Morocco','name_native' => 'المغرب‎|ⵍⵎⴰⵖⵔⵉⴱ|Maroc','code' => 'ma'),
			array('id' => '36','name' => 'Monaco','name_native' => NULL,'code' => 'mc'),
			array('id' => '37','name' => 'Moldova','name_native' => NULL,'code' => 'md'),
			array('id' => '38','name' => 'Montenegro','name_native' => 'Crna Gora|Црна Гора','code' => 'me'),
			array('id' => '39','name' => 'Macedonia','name_native' => 'Македонија','code' => 'mk'),
			array('id' => '40','name' => 'Malta','name_native' => NULL,'code' => 'mt'),
			array('id' => '41','name' => 'Netherlands','name_native' => 'Nederland','code' => 'nl'),
			array('id' => '42','name' => 'Norway','name_native' => 'Norge','code' => 'no'),
			array('id' => '43','name' => 'Poland','name_native' => 'Polska','code' => 'pl'),
			array('id' => '44','name' => 'Portugal','name_native' => NULL,'code' => 'pt'),
			array('id' => '45','name' => 'Qatar','name_native' => 'قطر','code' => 'qa'),
			array('id' => '46','name' => 'Romania','name_native' => 'România','code' => 'ro'),
			array('id' => '47','name' => 'Serbia','name_native' => 'Srbija|Србија','code' => 'rs'),
			array('id' => '48','name' => 'Russia','name_native' => 'Россия','code' => 'ru'),
			array('id' => '49','name' => 'Sweden','name_native' => 'Sverige','code' => 'se'),
			array('id' => '50','name' => 'Slovenia','name_native' => 'Slovenija','code' => 'si'),
			array('id' => '51','name' => 'Slovakia','name_native' => 'Slovensko','code' => 'sk'),
			array('id' => '52','name' => 'San Marino','name_native' => NULL,'code' => 'sm'),
			array('id' => '53','name' => 'Soviet Union','name_native' => 'Советский Союз','code' => 'su'),//'is_former'=>true,
			array('id' => '54','name' => 'Tunisia','name_native' => 'ⵜⵓⵏⵙ|تونس','code' => 'tn'),
			array('id' => '55','name' => 'Turkey','name_native' => 'Türkiye','code' => 'tr'),
			array('id' => '56','name' => 'Ukraine','name_native' => 'Україна','code' => 'ua'),
			array('id' => '57','name' => 'Yugoslavia','name_native' => 'Jugoslavija|Југославија','code' => 'yu')//'is_former'=>true,
			);

		// Uncomment the below to run the seeder
DB::table('countries')->insert($countries);
}

}
