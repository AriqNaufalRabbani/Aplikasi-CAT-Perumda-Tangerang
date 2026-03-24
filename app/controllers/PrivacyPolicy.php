<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class PrivacyPolicy extends Controller {

	public function index() {
		$this->view('PrivacyPolicy/index');
	}
}