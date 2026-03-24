<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Logout extends Controller {

	public function index() {
		$Result 	= $this->model('Login_model')->ProcessLogout();

		header("Location: " . BASE_URL);
	}
}