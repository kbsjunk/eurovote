<?php
namespace Eurovote;

use Goutte\Client;
use Carbon\Carbon;
use Symfony\Component\DomCrawler\Crawler;

class EurovisionCrawler {

	private $client;
	private $crawler;

	public $url;

	public function __construct($url = false) {
		$this->client = new Client();
		$this->url = $url;
		if ($url) {
			$this->setUri($url);
		}
	}

	public function setUri($url) {
		$this->crawler = $this->client->request('GET', $this->url);
	}

	public function dump($output = true) {
		unset($this->client);
		unset($this->patterns);
		unset($this->crawler);
		if ($output) {
			echo '<pre>';
			print_r($this);
			echo '</pre>';
		}
	}

	public function getContests() {
		$contests = $this->crawler->filter('.event-entry a')->each(function (Crawler $node, $i) {

			$city = $this->extract($node->text(), 'city year');

			return array(
				'city' => $city->city,
				'year' => intval($city->year),
				'url' => $node->link()->getUri()
				);
		});

		usort($contests, function($a, $b) {
			if ($a['year'] == $b['year']) {
				return 0;
			}
			return ($a['year'] < $b['year']) ? -1 : 1;
		});

		foreach ($contests as &$contest) {
			$contest['contest'] = \Contest::findbySlug($contest['year']);
			if (!$contest['contest']) {
				$contest['guess']['city'] = \City::findBySlug($contest['city']);
			}
		}

		$this->contests = $contests;
	}

	function getDetails() {

		if ($this->url) {

			$this->contest = $this->crawler->filter('.cb-EventInfo-story h1')->text();
			$heat = $this->extract($this->contest, 'contest year heat');

			$this->final = $heat->heat == 'Final' || is_null($heat->heat);
			$this->semi = $heat->semi;

			$details = $this->crawler->filter('.cb-EventInfo-facts .detail-list')->filter('h3')->each(function (Crawler $node, $i) {
				$key = trim($node->text());
				$value = trim($node->nextAll()->first()->text());

				switch ($key) {

					case 'Date':
					$value = new Carbon($value);
					break;

					case 'Location':
					$value = $this->extract($value, 'location city country');
					break;

					case 'Hosts':
					case 'Executive Producer':
					case 'EBU Scrutineer':
					case 'Director':
					case 'Interval Act':
					$value = $this->split($value);
					break;

					case 'Winner':
					$value = $this->extract($value, 'performer from country');
					break;

					case 'Qualifiers':
					$value = $node->nextAll()->first()->filter('li.qualifiers a')->each(function (Crawler $node, $i) {
						return $node->text();
					});
					break;

				}

				return array(
					$key => $value,
					);
			});

			$this->details = $this->liftArray($details);

			if ($this->final) {

				$heats = $this->crawler->filter('.cb-EventInfo-allevents ul.events li a')->each(function (Crawler $node, $i) {

					return array(
						'heat' => $node->text(),
						'url' => $node->link()->getUri()
						);
				});

				$this->heats = $heats;

				$this->getHeats();
			}
		}
	}

	public function getScoreboard() {

		$scoreboard = $this->crawler->filter('.cb-EventInfo-scoreboard .votes_crosstable')->filter('tbody tr')->each(function (Crawler $node, $i) {

			$votes = $node->filter('td:not(.participant):not(.total):not(.rank)')->each(function (Crawler $node, $i) {

				$votes = $this->extract($node->attr('title'), 'pt goes to');

				if ($votes->points) {
					return array(
						'points' => $votes->points,
						'from' => $votes->from,
						);
				}

				return false;

			});

			$votes = array_filter($votes);

			$participant = trim($node->filter('td.participant .country')->text());
			$points = intval($node->filter('td.total')->text());
			$place = intval($node->filter('td.rank')->text());

			return array(
				'country' => $participant,
				'votes' => $votes,
				'points' => $points,
				'place' => $place
				);

		});

		$this->scoreboard = $scoreboard;
	}

	public function getParticipants() {
		$participants = $this->crawler->filter('.cb-ParticipantList table.participants')->filter('tbody tr')->each(function (Crawler $node, $i) {

			$order = intval($node->filter('td.ro')->text());
			$country = trim($node->filter('td.country a')->text());
			$broadcaster = trim($node->filter('td.country .broadcaster')->text());

			$performer = $node->filter('td.country')->nextAll()->first();

			if (count($performer->filter('.credits a')))
				$profile = $performer->filter('.credits a')->link()->getUri();

			$song = $node->filter('td.points')->previousAll()->first();

			if (count($song->filter('.youtube-watch')))
				$video = $this->extract($song->filter('.youtube-watch')->link()->getUri(), 'youtube');

			if (stristr($song->text(), 'Watch video')) {
				$song = $this->extract($song->text(), 'song video')->song;
			}
			else {
				$song = $song->text();
			}

			$points = intval($node->filter('td.points')->text());
			$place = intval($node->filter('td.place')->text());

			$winner = $place == 1 && $this->final == true;

			$return = array(
				'order' => $order,
				'country' => $country,
				'broadcaster' => $broadcaster,
				'performer' => trim($performer->filter('span')->text()),
				'url' => @$profile,
				'song' => trim($song),
				'youtube' => @$video->youtube,
				'points' => $points,
				'place' => $place,
				);

			if ($this->final) {
				$return['winner'] = $place == 1;
			}
			elseif ($this->semi) {
				$qualified = null;

				if (isset($this->details['Qualifiers']))
					$qualified = in_array($country, $this->details['Qualifiers']);

				$return['qualified'] = $qualified;
			}

			return $return;

		});

$this->participants = $participants;

}

public function getHeats() {
	if (is_array(@$this->heats)) {
		foreach ($this->heats as &$heat) {
			$event = new EurovisionEvent($heat['url']);
			$event->getDetails();
			$event->getScoreboard();
			$event->getParticipants();
			$event->dump(false);
			$heat['event'] = $event;	
		}
	}
}

	private $patterns = array(
		'city year' => '(?P<city>.*) (?P<year>[0-9]{4})',
		'pt goes to' => '(?P<points>[0-9]*)pt from (?P<from>.*) goes to (?P<to>.*)',
		'youtube' => 'v=(?P<youtube>[^&]*)',
		'song video' => '(?P<song>.*?)\s*Watch video',
		'location city country' => '(?P<venue>.*), *(?P<city>.*), *(?P<country>.*)',
		'performer from country' => '(?P<performer>.*?) *from *(?P<country>.*)?',
		'contest year heat' => 'Eurovision Song Contest (?<year>[0-9]{4})(?: (?<heat>Final|Semi-Final)(?: \((?<semi>[0-9]+)\))?)?',
		);


	public function extract($text, $pattern) {

		$pattern = $this->_pattern($pattern);

		if (!$pattern) return $text;

		preg_match_all($pattern, trim($text), $result);

		$return = new \stdClass();

		foreach ($result as $key => $value) {
			if (!is_numeric($key)) {
				$return->$key = trim($value[0]);
			}
		}

		return $return;
	}

	private function _pattern($key) {

		if (isset($this->patterns[$key])) {
			return '/'.$this->patterns[$key].'/';
		}
		else {
			return false;
		}
	}

	public function split($text, $delimiter = ',') {

		$text = explode($delimiter, trim(trim($text), $delimiter));

		array_walk($text, function(&$n) {
			$n = trim($n);
		}); 

		return $text;

	}

	public function liftArray($array) {
		$return = array();

		foreach ($array as $id => $subarray) {
			foreach ($subarray as $key => $value) {
				$return[$key] = $value;
			}
		}

		return $return;

	}

}