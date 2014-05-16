<?php

class AdminController extends BaseController {

	/**
	 * Display an admin index view.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.index');
	}

}
