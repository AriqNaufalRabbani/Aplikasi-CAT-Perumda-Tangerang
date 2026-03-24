<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Users extends Controller {
    
	public function index() {
        $data['users'] = $this->model('Users_model')->getAllUsers();
        $data['users_menu'] = $this->model('Users_model')->getUserMenu();

        $this->view('templates/header');
        $this->view('setting/users/index', $data);
        $this->view('templates/footer');
    }

	public function add() {
        $data['groups'] = $this->model('Groups_model')->getGroups();
        $data['users'] = $this->model('Users_model')->getKaryawanActive();
        $menu = $this->model('Menu_model')->getMenu();

        foreach ($menu as $menus) {
            $ParentId = trim($menus['ParentId']);
            $data['menu'][$ParentId][] = $menus;
        }

        $this->view('setting/users/add', $data);
	}

	public function edit() {
        $NIK = $_POST['NIK'];
        $data['groups'] = $this->model('Groups_model')->getGroups();
        $data['user']   = $this->model('Users_model')->getUsersByNIK($NIK);
        $menu = $this->model('Users_model')->getUserMenuByNIK($NIK);

        foreach ($menu as $menus) {
            $ParentId = trim($menus['ParentId']);
            $data['menu'][$ParentId][] = $menus;
        } 
        
        $this->view('setting/users/edit', $data);
	}

	public function getKaryawanByName() {
        $NmKaryawan     = $_GET['search'];
        $getKaryawanByName = $this->model('Users_model')->getKaryawanByName($NmKaryawan);       
        
        $list = array();
        $key  = 0;
        foreach ($getKaryawanByName as $Users) {
            $nik        = trim($Users["nik"]);
            $karyawan   = trim($Users["karyawan"]);
            $job_title  = trim($Users["job_title"]);
            $list[$key]['id']   = $nik;
            $list[$key]['text'] = $karyawan . ' | ' . $job_title; 
            $key++;
        }

        echo json_encode($list);
	}

	public function pushUsers() {
        $Result = $this->model('Users_model')->pushUsers();

        if ($Result) {
            Flasher::pushFlash('success', 'Users berhasil ditambahkan');
            echo json_encode(array(
                'result' => 'success'
            ));
        }
	}

	public function setUsers() {
        $Result = $this->model('Users_model')->setUsers();

        if ($Result) {
            Flasher::pushFlash('success', 'Users berhasil diubah');
            echo json_encode(array(
                'result' => 'success'
            ));
        }
	}

	public function ubah_status() {
        $setStatusUser = $this->model('Users_model')->setStatusUser();

        if ($setStatusUser) {
            echo json_encode(array(
                'result' => 'success'
            ));
        }
    }

	public function reset_password() {
        $Result = $this->model('Users_model')->setPasswordUsers();

        if ($Result) {
            $Result = array(
                'result' => 'success'
            );
        }
        else {
            $Result = array(
                'result' => 'failed'
            );
        }

        echo json_encode($Result);
	}

}