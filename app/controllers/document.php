<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class document extends Controller {

	public function index() {
		$this->view('templates/header');
		$this->view('document/index');
		$this->view('templates/footer');
	}

	public function fetch() {
		$result = $this->model('document_model')->fetch();

		echo json_encode($result);
    }

	public function edit() {
		$data['cd'] = $this->model('document_model')->getEdit();

		$this->view('templates/header');
		$this->view('document/edit', $data);
		$this->view('templates/footer');
	}

	public function process_edit() {
		$Result = $this->model('document_model')->process_edit();

        if ($Result) {
            Flasher::pushFlash('success', 'Data berhasil diubah');
	        echo json_encode(array(
	            'result' => 'success'
	        ));
        }
    }

	public function posting_actual() {
		$data['cd'] = $this->model('document_model')->cut_off_dboard_mkt();

		$this->view('templates/header');
		$this->view('document/posting_actual', $data);
		$this->view('templates/footer');
	}

	public function post_actual() {
		$Result = $this->model('document_model')->post_actual();

        if ($Result) {
            Flasher::pushFlash('success', 'Data berhasil ditambahkan');
	        echo json_encode(array(
	            'result' => 'success'
	        ));
        }
    }

	public function posting_projection() {
		$data['cd'] = $this->model('document_model')->cut_off_dboard_mkt();

		$this->view('templates/header');
		$this->view('document/posting_projection', $data);
		$this->view('templates/footer');
	}

	public function post() {
		$Result = $this->model('document_model')->post();

        if ($Result) {
            Flasher::pushFlash('success', 'Data berhasil ditambahkan');
	        echo json_encode(array(
	            'result' => 'success'
	        ));
        }
    }

	public function upload() {
		$this->view('templates/header');
		$this->view('document/upload');
		$this->view('templates/footer');
	}

	public function upload_document() {
		$Result = $this->model('document_model')->upload_document();

        if ($setStatusMenu) {
            Flasher::pushFlash('success', 'Data berhasil ditambahkan');
	        echo json_encode(array(
	            'result' => 'success'
	        ));
        }
    }

	public function ex_template() {
		$data['cs'] = $this->model('document_model')->Salesman();
		$this->view('document/ex_template', $data);
    }

}