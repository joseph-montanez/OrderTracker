<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 10/26/13
 * Time: 2:31 AM
 */

class AuthController extends BaseController {
    public function __construct() {
        parent::__construct();

        $this->beforeFilter(function () {
            if (!Sentry::check()) {
                return Redirect::to('login');
            }
        });
    }
} 