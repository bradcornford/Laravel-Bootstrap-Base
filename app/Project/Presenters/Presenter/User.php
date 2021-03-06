<?php namespace Project\Presenters\Presenter;

use Project\Presenters\Presenter;

class User extends Presenter {

	/**
	 * Present the name
	 *
	 * @return string
	 */
	public function name()
	{
		return ucwords($this->entity->name);
	}

	/**
	 * Present the email
	 *
	 * @return string
	 */
	public function email()
	{
		return $this->entity->email;
	}

	/**
	 * Present the roles
	 *
	 * @return string
	 */
	public function roles()
	{
		$roles = $this->entity->roles;
		$return = '';

		foreach ($roles as $role)
		{
			$return .= $role->present()->name() . ', ';
		}

		if (empty($return))
		{
			$return = 'None';
		}

		return trim($return, ', ');
	}

} 