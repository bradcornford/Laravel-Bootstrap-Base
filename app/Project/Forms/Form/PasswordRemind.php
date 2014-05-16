<?php namespace Project\Forms\Form;

use Project\Forms\FormValidator;

class PasswordRemind extends FormValidator {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	protected $rules = array(
		'email' => 'required|email'
	);

}
