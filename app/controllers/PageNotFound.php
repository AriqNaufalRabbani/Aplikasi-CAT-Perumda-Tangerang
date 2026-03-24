<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class PageNotFound extends Controller {

	public function index() {
		http_response_code(404);
        $this->view('templates/header');
        $this->view('templates/404');
        $this->view('templates/footer');
	}
}