<?php

class LoginController extends BaseController {

	public $errors = [
		'Cartalyst\Sentry\Users\LoginRequiredException' => 'An email is required',
		'Cartalyst\Sentry\Users\PasswordRequiredException' => 'A password is required',
		'Cartalyst\Sentry\Users\UserNotFoundException' => 'Invalid email or password',
		'Cartalyst\Sentry\Users\WrongPasswordException' => 'Invalid email or password',
		'Cartalyst\Sentry\Users\UserNotActivatedException' => 'User is not active'
	];

	/**
	 * Setup the login view
	 * @return Illuminate\View\View
	 */
	public function showLogin() {
		return View::make('user.login');
	}

	/**
	 * Authenticate the user, and return the user, or return false if it failed
	 * @param array $credentials
	 * @return boolean|Cartalyst\Sentry\Users\Eloquent\User
	 */
	public function authUser(array $credentials) {
		try {
			$remember = false;
			if (isset($credentials['remember'])) {
				$remember = $credentials['remember'] ? true : false;
				unset($credentials['remember']);
			}
			return Sentry::authenticate($credentials, $remember);
		} catch (Exception $e) {
			Session::flash('errors', array('email' => array($errors[get_class($e)])));
			return false;
		}
	}

	/**
	 * Log in the user
	 * @return \Illuminate\Support\Facades\Redirect
	 */
	public function doLogin() {
		$user = $this->authUser(Input::only('email', 'password', 'remember'));
		if ($user !== false) {
			return Redirect::to('dashboard');
		} else {
			return Redirect::to('login')->withErrors($this->setupErrors())->withInput();
		}
	}

    /**
     * Log out a user
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function doLogout() {
        Sentry::logout();
        return Redirect::to('');
    }

}
