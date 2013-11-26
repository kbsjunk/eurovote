<?php

class Contest extends Ardent {
	use SluggerFind;

	public static $sluggable = false;

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

}
