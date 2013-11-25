<?php

class Contest extends Ardent {

	protected $guarded = array();

	public static $rules = array();

	public static $relationsData = array(
		'city' => array(self::BELONGS_TO, 'City'),
		'heats'  => array(self::HAS_MANY, 'Heat'),
		// 'groups'  => array(self::BELONGS_TO_MANY, 'Group', 'table' => 'groups_have_users')
		);

	public function getSlugName() {
		return 'year';
	}

	public static function findBySlug($slug, $columns = array('*'))
	{
		$instance = new static;

		if (is_array($slug))
		{
			return $instance->newQuery()->whereIn($instance->getSlugName(), $slug)->get($columns);
		}
		return $instance->newQuery()->where($instance->getSlugName(), '=', $slug)->first($columns);
	}
}
