<?php

class IndexController extends BaseController {

	/**
	 * Display an index view.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('index');
	}

}
