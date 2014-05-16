<?php namespace Project\Forms\Form;

use Project\Forms\FormValidator;

class UserCreate extends FormValidator {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	protected $rules = array(
		'name' => 'required',
		'email' => 'required|email|unique:users',
		'password' => 'required|confirmed|min:6',
		'password_confirmation' => 'required'
	);

}
