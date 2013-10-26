<?php

class HomeController extends BaseController {
	public function showWelcome() {
		return View::make('hello');
	}

	public function doLang() {
		if (Input::has('i18n_default')) {
			Session::put('i18n_default', Input::get('i18n_default'));
		}
		if (Input::has('redirect')) {
			return Redirect::to(Input::get('redirect'));
		}
	}

}
