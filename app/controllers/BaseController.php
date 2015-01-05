<?php

class BaseController extends Controller {

	
/*
	public function __construct(User $user) {
		parent::__construct();
		View::share('site_users', $user::all());
	}
*/
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
