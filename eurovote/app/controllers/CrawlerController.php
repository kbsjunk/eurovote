<?php

class CrawlerController extends BaseController {

	public function postHandler($entity = false) {
		dd(Input::all());
	}

	public function contests() {

		$ev = new EurovisionCrawler('http://www.eurovision.tv/page/history/year');

		$ev->getContests();
		
		return View::make('crawler.contests',
			array(
				'contests' => $ev->contests,
				'all' => $this->_all()
				)
			);
	}

	public function contest($id)
	{

		$ev = new EurovisionCrawler('http://www.eurovision.tv/page/history/by-year/contest?event=1553');
		$ev->getDetails();
		$ev->getScoreboard();
		$ev->getParticipants();

		$ev->dump();

	}

	private function _all() {
		$all = new stdClass();

		$cities = City::orderBy('name')->orderBy('disambig')->get();
		foreach ($cities as $city) {
			$all->cities[$city->getKey()] = $city->display_text;
		}

		// $countries = Country::all();
		// foreach ($countries as $country) {
		// 	$all->countries[$country->getKey()] = $country->display_text;
		// }

		return $all;
	}


}
