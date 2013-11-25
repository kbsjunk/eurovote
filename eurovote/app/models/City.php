<?php

class City extends Ardent {
	protected $guarded = array();

	public static $rules = array();

	public static $relationsData = array(
		'country' => array(self::BELONGS_TO, 'Country'),
		'contests'  => array(self::HAS_MANY, 'Contest'),
		// 'groups'  => array(self::BELONGS_TO_MANY, 'Group', 'table' => 'groups_have_users')
		);

	public function getSlugName() {
		return 'slug';
	}

	public static function findBySlug($slug, $columns = array('*'))
	{
		$slug = Str::slug($slug);
		
		$instance = new static;

		if (is_array($slug))
		{
			return $instance->newQuery()->whereIn($instance->getSlugName(), $slug)->get($columns);
		}
		return $instance->newQuery()->where($instance->getSlugName(), '=', $slug)->first($columns);
	}
}
