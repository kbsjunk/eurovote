<?php

class ContestsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('contests')->truncate();

		$contests = array(
			array('id' => '1','year' => '1956','city_id' => '1'),
			array('id' => '2','year' => '1957','city_id' => '2'),
			array('id' => '3','year' => '1958','city_id' => '3'),
			array('id' => '4','year' => '1959','city_id' => '4'),
			array('id' => '5','year' => '1960','city_id' => '5'),
			array('id' => '6','year' => '1961','city_id' => '4'),
			array('id' => '7','year' => '1962','city_id' => '6'),
			array('id' => '8','year' => '1963','city_id' => '5'),
			array('id' => '9','year' => '1964','city_id' => '7'),
			array('id' => '10','year' => '1965','city_id' => '8'),
			array('id' => '11','year' => '1966','city_id' => '6'),
			array('id' => '12','year' => '1967','city_id' => '9'),
			array('id' => '13','year' => '1968','city_id' => '5'),
			array('id' => '14','year' => '1969','city_id' => '10'),
			array('id' => '15','year' => '1970','city_id' => '11'),
			array('id' => '16','year' => '1971','city_id' => '12'),
			array('id' => '17','year' => '1972','city_id' => '13'),
			array('id' => '18','year' => '1973','city_id' => '6'),
			array('id' => '19','year' => '1974','city_id' => '14'),
			array('id' => '20','year' => '1975','city_id' => '15'),
			array('id' => '21','year' => '1976','city_id' => '16'),
			array('id' => '22','year' => '1977','city_id' => '5'),
			array('id' => '23','year' => '1978','city_id' => '17'),
			array('id' => '24','year' => '1979','city_id' => '18'),
			array('id' => '25','year' => '1980','city_id' => '16'),
			array('id' => '26','year' => '1981','city_id' => '12'),
			array('id' => '27','year' => '1982','city_id' => '19'),
			array('id' => '28','year' => '1983','city_id' => '20'),
			array('id' => '29','year' => '1984','city_id' => '6'),
			array('id' => '30','year' => '1985','city_id' => '21'),
			array('id' => '31','year' => '1986','city_id' => '22'),
			array('id' => '32','year' => '1987','city_id' => '23'),
			array('id' => '33','year' => '1988','city_id' => '12'),
			array('id' => '34','year' => '1989','city_id' => '24'),
			array('id' => '35','year' => '1990','city_id' => '25'),
			array('id' => '36','year' => '1991','city_id' => '26'),
			array('id' => '37','year' => '1992','city_id' => '27'),
			array('id' => '38','year' => '1993','city_id' => '28'),
			array('id' => '39','year' => '1994','city_id' => '12'),
			array('id' => '40','year' => '1995','city_id' => '12'),
			array('id' => '41','year' => '1996','city_id' => '29'),
			array('id' => '42','year' => '1997','city_id' => '12'),
			array('id' => '43','year' => '1998','city_id' => '30'),
			array('id' => '44','year' => '1999','city_id' => '18'),
			array('id' => '45','year' => '2000','city_id' => '15'),
			array('id' => '46','year' => '2001','city_id' => '7'),
			array('id' => '47','year' => '2002','city_id' => '31'),
			array('id' => '48','year' => '2003','city_id' => '32'),
			array('id' => '49','year' => '2004','city_id' => '33'),
			array('id' => '50','year' => '2005','city_id' => '34'),
			array('id' => '51','year' => '2006','city_id' => '35'),
			array('id' => '52','year' => '2007','city_id' => '36'),
			array('id' => '53','year' => '2008','city_id' => '37'),
			array('id' => '54','year' => '2009','city_id' => '38'),
			array('id' => '55','year' => '2010','city_id' => '29'),
			array('id' => '56','year' => '2011','city_id' => '39'),
			array('id' => '57','year' => '2012','city_id' => '40'),
			array('id' => '58','year' => '2013','city_id' => '27')
			);


		// Uncomment the below to run the seeder
DB::table('contests')->insert($contests);
}

}
