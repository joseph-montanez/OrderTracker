<?php

class BaseController extends Controller {
     function __construct() {
         if (Session::has('i18n_default')) {
             App::setLocale(Session::get('i18n_default'));
         }
	 }

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
	
	/**
	 * Setup errors from session into message bag
	 * @return \Illuminate\Support\MessageBag
	 */
	protected function setupErrors() {
		$messages = new \Illuminate\Support\MessageBag();
		$errors = Session::get('errors');
		foreach ($errors as $key => $error) {
			$messages->add($key, $error[0]);
		}
		return $messages;
	}

}