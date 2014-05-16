<?php namespace Project\Forms\Form;

use Project\Forms\FormValidator;

class RoleUpdate extends FormValidator {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	protected $rules = array(
		'name' => 'required'
	);

}
