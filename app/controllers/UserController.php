<?php

use Project\Forms\Form\Register;
use Project\Forms\Form\UserUpdate;
use Project\Forms\Exceptions\FormValidationException;

class UserController extends BaseController {

	/**
	 * Register form validator
	 *
	 * @var Project\Forms\Form\Login
	 */
	protected $registerForm;

	/**
	 * Update profile form validator
	 *
	 * @var Project\Forms\Form\UserUpdate
	 */
	protected $userUpdateForm;

	/**
	 * Construct the session controller with a register form validator
	 *
	 * @param Register   $registerForm
	 * @param UserUpdate $userUpdateForm
	 */
	public function __construct(Register $registerForm, UserUpdate $userUpdateForm)
	{
		$this->registerForm = $registerForm;
		$this->userUpdateForm = $userUpdateForm;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('name', 'email', 'password', 'password_confirmation');
		$this->registerForm->validate($input);

		$user = new User;
		$user->name = $input['name'];
		$user->email = $input['email'];
		$user->password = Hash::make($input['password']);
		$user->save();

		return Redirect::route('login')->withMessage(Bootstrap::success('Registraion successfull.'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		if ($id != Auth::user()->id)
		{
			return Redirect::home()->withMessage(Bootstrap::danger('You dont permission to access this page.'));
		}

		$user = Auth::user();

		return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		if ($id != Auth::user()->id)
		{
			return Redirect::home()->withMessage(Bootstrap::danger('You dont permission to access this page.'));
		}

		$user = Auth::user();

		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function update($id)
	{
		if ($id != Auth::user()->id)
		{
			return Redirect::home()->withMessage(Bootstrap::danger('You dont permission to access this page.'));
		}

		$input = Input::only('name', 'email', 'password', 'password_confirmation');
		$this->userUpdateForm->validate($input);

		$user = Auth::user();
		$user->name = $input['name'];
		$user->email = $input['email'];

		if ( ! empty($input['password']) && $input['password'] == $input['password_confirmation'])
		{
			$user->password = Hash::make($input['password']);
		}

		$user->save();

		return Redirect::route('user.show', $user->id)
			->withMessage(Bootstrap::success('Profile updated successfully.'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param integer $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		if ($id != Auth::user()->id)
		{
			return Redirect::home()->withMessage(Bootstrap::danger('You dont permission to access this page.'));
		}

		$user = Auth::user();
		$user->delete();

		Auth::logout();

		return Redirect::home()->withMessage(Bootstrap::success('Profile has been destroyed.'));
	}

}
