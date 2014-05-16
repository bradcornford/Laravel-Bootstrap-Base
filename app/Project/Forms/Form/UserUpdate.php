<?php namespace Project\Forms\Form;

use Project\Forms\FormValidator;

class UserUpdate extends FormValidator {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	protected $rules = array(
		'name' => 'required',
		'email' => 'required|email',
		'password' => 'min:6|confirmed',
		'password_confirmation' => 'required_with:password'
	);

}
