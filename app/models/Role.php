<?php

use Project\Presenters\PresentableTrait;

class Role extends Eloquent {

	use PresentableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';

	/**
	 * The attributes allowed to be mass assigned.
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'active');

	/**
	 * The model presenter.
	 *
	 * @var string
	 */
	protected $presenter = 'Project\Presenters\Presenter\Role';

	/**
	 * The user relationship.
	 *
	 * @var User
	 */
	public function user()
	{
		return $this->hasMany('User');
	}
}
