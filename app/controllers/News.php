<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class News extends Controller {

	public function index() {
		$data['news'] = $this->model('News_model')->getAllNews();
		$this->view('templates/header');
		$this->view('Setting/news/index', $data);
		$this->view('templates/footer');
	}

	public function add() {
		$this->view('Setting/news/add');
	}

	public function push() {
        if (!empty($_POST['News'])) {
            $result = $this->model('News_model')->pushNews();

            if ($result) {
                Flasher::pushFlash('success', 'News berhasil ditambahkan');
                $result = array('result' => 'success');
            }
            else {
                $result = array('result' => 'failed');
            }
        }
        else {
            $result = array('result' => 'failed');
        }
        
        echo json_encode($result);
	}

	public function setNews() {
		$result = $this->model('News_model')->setNews();

        if ($result) {
            $result = array('result' => 'success');
        }
        else {
            $result = array('result' => 'failed');
        }

        echo json_encode($result);
	}
}