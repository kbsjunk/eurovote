<?php

class SluggerController extends BaseController {

	public function cities($force = false)
	{
		return $this->doSlug(City::all());
	}
	public function countries($force = false)
	{
		return $this->doSlug(Country::all());
	}
	public function contests($force = false)
	{
		return $this->doSlug(Contest::all());
	}

	private function doSlug($records, $force = false) {
		$contents = '';
		foreach ($records as $record) {

			if (!isset($record->attributes['slug']) || $force) {
				Sluggable::make($record, true);
				$record->save();
			}

			$contents .= $record->name . ' => ' . $record->slug . PHP_EOL;
		}

		$response = Response::make($contents, 200);
		$response->header('Content-Type', 'text/plain');

		return $response;
	}

}
