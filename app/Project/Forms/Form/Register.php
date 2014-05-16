<?php namespace Project\Forms\Form;

use Project\Forms\FormValidator;

class Register extends FormValidator {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	protected $rules = array(
		'name' => 'required',
		'email' => 'required|email|unique:users',
		'password' => 'required|min:6',
		'password_confirmation' => 'required'
	);

}
