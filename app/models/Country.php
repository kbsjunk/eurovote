<?php

class Country extends Ardent {
	use SluggerFind, SluggerSave, Displayable;

	protected $guarded = array();

	public static $rules = array();

	public static $relationsData = array(
		// 'address' => array(self::HAS_ONE, 'Address'),
		'cities'  => array(self::HAS_MANY, 'City'),
		// 'groups'  => array(self::BELONGS_TO_MANY, 'Group', 'table' => 'groups_have_users')
		);

	public function explode($attr) {
		return explode('|', $this->attributes[$attr]);
	}




}
