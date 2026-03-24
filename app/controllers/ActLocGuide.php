<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class ActLocGuide extends Controller {

	public function index() {
		// $this->view('templates/header');
		$this->view('ActLocGuide/index');
		// $this->view('templates/footer');
	}

	public function AddGeoLoc() {
		$Result = $this->model('actloc_model')->AddGeoLoc();

		echo $Result;
	}
}
?>