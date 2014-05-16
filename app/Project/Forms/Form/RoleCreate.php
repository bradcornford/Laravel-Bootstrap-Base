<?php namespace Project\Forms\Form;

use Project\Forms\FormValidator;

class RoleCreate extends FormValidator {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	protected $rules = array(
		'name' => 'required|unique:roles'
	);

}
