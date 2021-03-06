<?php

use Project\Forms\Form\RoleCreate;
use Project\Forms\Form\RoleUpdate;
use Project\Forms\Exceptions\FormValidationException;

class RolesController extends BaseController {

	/**
	 * Roles create form validator
	 *
	 * @var Project\Forms\Form\RoleCreate
	 */
	protected $rolesCreateForm;

	/**
	 * Roles update form validator
	 *
	 * @var Project\Forms\Form\RoleUpdate
	 */
	protected $rolesUpdateForm;

	/**
	 * Construct the session controller with roles form validators
	 *
	 * @param RoleCreate $rolesCreateForm
	 * @param RoleUpdate $rolesUpdateForm
	 */
	public function __construct(RoleCreate $rolesCreateForm, RoleUpdate $rolesUpdateForm)
	{
		$this->rolesCreateForm = $rolesCreateForm;
		$this->rolesUpdateForm = $rolesUpdateForm;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = Role::all();

		return View::make('admin.roles.index')->with(compact("roles"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.roles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('name', 'active');
		$this->rolesCreateForm->validate($input);

		$role = new Role;
		$role->name = $input['name'];
		$role->active = (Input::has('active') ? 1 : 0);
		$role->save();

		return Redirect::route('admin.index')->withMessage(Bootstrap::success('Role created successfully.', true));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$role = Role::findOrFail($id);

		return View::make('admin.roles.edit')->with(compact('role'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 *
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::only('name', 'active');
		$this->rolesUpdateForm->validate($input);

		$role = Role::findOrFail($id);
		$role->name = $input['name'];
		$role->active = (Input::has('active') ? 1 : 0);
		$role->save();

		return Redirect::route('admin.roles.index')->withMessage(Bootstrap::success('Role updated successfully.', true));
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
		$role = Role::findOrFail($id);
		$role->delete();

		return Redirect::route('admin.roles.index')->withMessage(Bootstrap::success('Role has been destroyed.', true));
	}

}
