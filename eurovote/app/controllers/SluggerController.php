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
			$done = '';

			if (!$record->slug || $force) {

				$slug = Str::slug($record->name);

				// if ($record->disambig) 				
				// 	$slug = $slug.'/'.Str::slug($record->disambig);

				// if ($record->slug != $slug) {
					// $record->slug = $slug;
				Sluggable::make($record, true);
				$record->save();
					// $done =' NEW';
				// }
			}

			$contents .= $record->name . ' => ' . $record->slug . $done . PHP_EOL;
		}

		$response = Response::make($contents, 200);
		$response->header('Content-Type', 'text/plain');

		return $response;
	}

	// private function doSlug($records, $force = false) {
	// 	$contents = '';
	// 	foreach ($records as $record) {
	// 		$done = '';

	// 		if (!$record->slug || $force) {

	// 			$slug = Str::slug($record->name);

	// 			if ($record->disambig) 				
	// 				$slug = $slug.'/'.Str::slug($record->disambig);

	// 			if ($record->slug != $slug) {
	// 				$record->slug = $slug;
	// 				$record->save();
	// 				$done =' NEW';
	// 			}
	// 		}

	// 		$contents .= $record->name . ' => ' . $record->slug . $done . PHP_EOL;
	// 	}

	// 	$response = Response::make($contents, 200);
	// 	$response->header('Content-Type', 'text/plain');

	// 	return $response;
	// }

}
