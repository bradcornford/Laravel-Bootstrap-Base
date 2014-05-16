<?php namespace Project\Presenters\Presenter;

use Project\Presenters\Presenter;

class Role extends Presenter {

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
	 * Present the active field
	 *
	 * @return string
	 */
	public function active()
	{
		return $this->entity->active ? 'Yes' : 'No';
	}

} 