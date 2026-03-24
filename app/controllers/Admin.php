<?php
defined('BASE_PATH') OR exit('No direct script access allowed');
// if (isset($_SESSION['userid'])) header('Location:' . BASE_URL . 'dashboard', 301) AND exit;

class Admin extends Controller {

	public function index() {
		$CheckLogin 	= $this->model('Login_model')->CheckLogin();
		if($CheckLogin == 'Success'){
			header('Location:' . BASE_URL . 'Dashboard', 301);
		}

		$this->view('login/admin/index');
	}

	public function process() {
        echo '<pre>';
        echo print_r($_POST);
        echo '</pre>';
        exit;
		$Result 	= $this->model('Login_model')->ProcessLogin();

		if ($Result['result'] == 'error') {
            Flasher::pushFlash($Result['result'], $Result['msg']);
	        header("Location: " . BASE_URL);
        }else{
			header("Location: " . BASE_URL . 'Dashboard');
		}
	}
}