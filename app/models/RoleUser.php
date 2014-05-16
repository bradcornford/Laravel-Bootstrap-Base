<?php

class UserRole extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'role_user';

	/**
	 * The attributes allowed to be mass assigned.
	 *
	 * @var array
	 */
	protected $fillable = array('user_id', 'role_id');

	/**
	 * The timestamps attributes.
	 *
	 * @var boolean
	 */
	public $timestamps = false;

	/**
	 * The user relationship.
	 *
	 * @var User
	 */
	public function user()
	{
		return $this->hasOne('User');
	}

	/**
	 * The role relationship.
	 *
	 * @var Role
	 */
	public function role()
	{
		return $this->hasOne('Role');
	}
}
