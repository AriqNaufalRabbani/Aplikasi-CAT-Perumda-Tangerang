<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Exam extends Controller {

	public function index($id_module) {
        $data['id_module'] = $id_module;

        $this->view('Exam/index', $data);
	}
}