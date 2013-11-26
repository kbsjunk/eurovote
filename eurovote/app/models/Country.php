<?php

class Country extends Ardent {
	use SluggerFind, SluggerSave;

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

	public function getNameNativeAttribute($value)
	{
		return explode('|', $value);
	}
	public function setNameNativeAttribute($value)
    {
        $this->attributes['name_native'] = implode('|', $value);
    }

	// public function beforeSave() {

	// 	if($this->isDirty('name') || is_null($this->slug)) {

	// 		$slug = strtolower(Str::slug($this->name));

	// 		if ($slug <> strtolower($this->name)) {
	// 			$this->slug = $slug;
	// 		}
	// 		else {
	// 			$this->slug = NULL;
	// 		}

	// 	}
	// }

}
