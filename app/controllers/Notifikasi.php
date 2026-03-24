<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Notifikasi extends Controller {
    
	public function index() {
        $this->model('Notifikasi_model')->updateAllNotif(USERID);
        $data['notifikasi'] = $this->model('Notifikasi_model')->getAllNotifByUser(USERID);

		$this->view('templates/header');
		$this->view('notifikasi/index', $data);
		$this->view('templates/footer');
    }
    
	public function updateNotifOnShow() {
        $IdNotif = $_POST['IdNotif'];
        return $this->model('Notifikasi_model')->updateNotifOnShow($IdNotif);
    }

    public function updateNotifOnOpen() {
        $IdNotif = $_POST['IdNotif'];
        return $this->model('Notifikasi_model')->updateNotifOnOpen($IdNotif);
    }

    public function updateNotifOnOpenAll() {
        return $this->model('Notifikasi_model')->updateNotifOnOpenAll();
    }
    
	public function getNotifByUser() {
        $data = $this->model('Notifikasi_model')->getNotifByUser(USERID);
        
        if (count($data) > 0) {
            $result = array(
                'data' => $data
            );
        }
        else {
            $result = array(
                'data' => array()
            );
        }

        echo json_encode($result);
    }

    public function PushNotifApproveGA() {
        $data = $this->model('Notifikasi_model')->PushNotifApproveGA(USERID);
    }

    public function PushNotifFireBase() {
        $data = $this->model('Notifikasi_model')->PushNotifFireBase(USERID);
    }

    public function DetectSpeed() {
		$data = $this->model('Notifikasi_model')->DetectSpeed();
		// return $data;
    }    

}