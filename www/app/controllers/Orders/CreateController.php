<?php
namespace Orders;

use View;
use AuthController;

class CreateController extends AuthController {
	/**
	 * Setup the create order view
	 * @return Illuminate\View\View
	 */
	public function showCreate() {
		return View::make('orders.create');
	}
	
	/**
	 * Get the validation rules
	 * @return array
	 */
	public function getRules() {
		return [
			'first_name' => 'required',
			'last_name' => 'required',
			'password' => 'required',
			'email' => 'required|email'
		];
	}

	/**
	 * Validate allowed input
	 * @return boolean
	 */
	public function isValid() {
		$validator = Validator::make($this->getAllowedInput(), $this->getRules());
		if ($validator->fails()) {
			return Redirect::to('orders/create')->withErrors($validator)->withInput();
		} else {
			return true;
		}
	}

	/**
	 * Get the allowed input when posted
	 * @return array
	 */
	public function getAllowedInput() {
		return Input::only(
			'name', 'email', 'pp_email', 'pp_customer_name', 'order_date', 
			'items', 'paid', 'delivered', 'due_date'
		);
	}

	/**
	 * Create Order
	 * @return \Illuminate\Support\Facades\Redirect
	 */
	public function doCreate() {
		
	}
}