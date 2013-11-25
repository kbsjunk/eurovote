<?php

class Heat extends Ardent {
	protected $guarded = array();

	public static $rules = array();

	public static $relationsData = array(
		'contest' => array(self::BELONGS_TO, 'Contest'),
		// 'groups'  => array(self::BELONGS_TO_MANY, 'Group', 'table' => 'groups_have_users')
		);
}
