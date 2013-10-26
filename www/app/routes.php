<?php
Route::filter('auth', function() {
    if (!Sentry::check()) {
        return Redirect::to('login');
	}
});

	
Route::get('/', function() {
    return View::make('home');
});
//-- Auth
Route::get('dashboard', array('before' => 'auth', function() {
    return View::make('user/dashboard');
}));

Route::get('orders/dashboard', array('before' => 'auth', function() {
    return View::make('orders/dashboard');
}));

Route::get('orders/create', 'Orders\CreateController@showCreate');

Route::get('logout', 'LoginController@doLogout');
//-- End Auth

Route::get('users', function() {
    $users = User::all();
    return View::make('users')->with('users', $users);
});

Route::get('register', 'RegisterController@showRegister');
Route::post('register', array('before' => 'csrf', function () {
    $cont = new RegisterController();
    return $cont->doRegister();
}));

Route::get('login', 'LoginController@showLogin');
Route::post('login', array('before' => 'csrf', function () {
    $cont = new LoginController();
    return $cont->doLogin();
}));

Route::post('setLanguage', 'HomeController@doLang');
Route::get('welcome', 'HomeController@showWelcome');
