<?php

class City extends Ardent {
	use SluggerFind, SluggerSave, Displayable;

	protected $guarded = array();

	public static $rules = array();

	public static $relationsData = array(
		'country' => array(self::BELONGS_TO, 'Country'),
		'contests'  => array(self::HAS_MANY, 'Contest'),
		// 'groups'  => array(self::BELONGS_TO_MANY, 'Group', 'table' => 'groups_have_users')
		);



}
