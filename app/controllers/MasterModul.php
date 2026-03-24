<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class MasterModul extends Controller {

	public function index() {
        $data['Kategori'] 	= $this->model('MasterModul_model')->getKategori();

		$this->view('templates/header');
		$this->view('MasterModul/index', $data);
		$this->view('templates/footer');
	}

    public function loadModules(){
        $Result 	= $this->model('MasterModul_model')->loadModules();

        echo json_encode($Result);
    }

    public function saveModules(){
        $Result 	= $this->model('MasterModul_model')->saveModules();

        echo json_encode($Result);
    }

    public function saveQuestions(){
        $Result 	= $this->model('MasterModul_model')->saveQuestions();

        echo json_encode($Result);
    }

    public function deleteModule(){
        $Result 	= $this->model('MasterModul_model')->deleteModule();

        echo json_encode($Result);
    }
}