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

}