<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Profile extends Controller {
    
	public function index() {
        $data['user'] = $this->model('Users_model')->getProfileByNIK(USERID);
        
        $this->view('templates/header');
        $this->view('profile/index', $data);
        $this->view('templates/footer');
    }
    
	public function setProfile() {
        $Result = $this->model('Users_model')->setProfile(USERID);

        if ($Result) {
            Flasher::pushFlash('success', 'Profile berhasil diubah');
            $Result = array(
                'result' => 'success'
            );
        }
        else {
            Flasher::pushFlash('error', 'Profile gagal diubah');
            $Result = array(
                'result' => 'failed'
            );
        }
        echo json_encode($Result);
    }

}