<?php

class City extends Ardent {
	use SluggerFind, SluggerSave;

	protected $guarded = array();

	public static $rules = array();

	public static $relationsData = array(
		'country' => array(self::BELONGS_TO, 'Country'),
		'contests'  => array(self::HAS_MANY, 'Contest'),
		// 'groups'  => array(self::BELONGS_TO_MANY, 'Group', 'table' => 'groups_have_users')
		);

	// public function scopeBySlug($query, $type)
	// {
	// 	return $query->where($instance->getSlugName(), '=', $slug);
	// }

}
