<?php

trait SluggerFind {

	public static function getSlugName() {
		
		$config = Config::get('eloquent-sluggable::config');
		if (isset(parent::$sluggable))
			$config = array_merge($config, parent::$sluggable);
		
		return $config['save_to'];
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

	public function getSlugAttribute() {
		if (!isset($this->attributes['slug'])) {
			return Str::slug($this->slugName);
		}

		return $this->attributes['slug'];
	}

}

trait SluggerSave {

	public static $sluggable = array();

}