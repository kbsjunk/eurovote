<?php

trait Displayable {

	public function getDisplayAttribute() {

		if ($disambig = parent::getAttribute('disambig'))
			$disambig = " <small>{$disambig}</small>";

		return parent::getAttribute('name') . $disambig;

	}

	public function getDisplayTextAttribute() {

		if ($disambig = parent::getAttribute('disambig'))
			$disambig = " ({$disambig})";

		return parent::getAttribute('name') . $disambig;

	}

	public function getNameNativeAttribute($value)
	{
		return array_filter(explode('|', $value));
	}
	public function setNameNativeAttribute($value)
	{
		if (is_array($value)) { 
			$value = array_filter($value);
			// sort($value);
			$value = implode('|', $value);
		}
		$this->attributes['name_native'] = $value;
	}

	public function anchor() {
		$model = str_plural(snake_case(get_class($this)));
		return link_to_route($model.'.show', $this->name, array($this->slug));
	}

}