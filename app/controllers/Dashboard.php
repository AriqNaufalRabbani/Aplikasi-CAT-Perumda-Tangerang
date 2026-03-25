<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Dashboard extends Controller {

	public function index() {
		// $CheckLogin 	= $this->model('Login_model')->CheckLogin();
		// if($CheckLogin == 'Failed'){
		// 	header('Location:' . BASE_URL . 'Login', 301);
		// }

		if(USERID == ''){
			header('Location:' . BASE_URL . '', 301);
		}


		// $data['CheckLogin']				= USERID;

		if($_SESSION['role'] == 'Peserta'){
			$data['Modules'] 	= $this->model('MasterModul_model')->getModulesbyUser();
			
			$this->view('templates/header');
			$this->view('dashboard/index', $data);
			$this->view('templates/footer');
		}else{
			$this->view('templates/header');
			$this->view('dashboard/admin');
			$this->view('templates/footer');
		}
	}

	public function TesNotif(){
		session_destroy();
		$Title      	= 'Approval (Tes Notif) - CRM Supernova';
        $click_action   = 'https://crm.supernova-id.com/crm/?standalone=pwa';
        $message    	= 'Mohon untuk di Proses segera!'+$click_action;
        // $click_action   = 'https://crm.supernova-id.com/crm/eapptm';
		// "deepLink": "myapp://example.com/deeplink"
        $Module     	= 'eapptm';
        $To         	= USERID;

		// $Title          = 'Approval TM(MKT/TM/SFP/23/X/002543) - CRM Supernova';
		// $message        = 'Mohon untuk di Proses segera!';
		// $click_action   = 'https://crm.supernova-id.com/crm/eapptm';
		// $Module         = 'eapptm';
		// $To         	= USERID;

        return $SendNotif = $this->model('Notifikasi_model')->PushNotifFireBase($Title, $message, $click_action, $Module, $To);

	}

}