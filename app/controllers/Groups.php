<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Groups extends Controller {

	public function index() {
        $res            = $this->model('Groups_model')->getAllGroups();
        $data['groups'] = $res['groups'];

        // foreach ($res['menus'] as $menus) {
        //     $IdGroups = trim($menus['IdGroups']);

        //     $data['menus'][$IdGroups][] = $menus;
        // }

        $this->view('templates/header');
        $this->view('setting/groups/index', $data);
        $this->view('templates/footer');
    }

	public function add() {
        // $menu = $this->model('Menu_model')->getMenu();

        // foreach ($menu as $menus) {
        //     $ParentId = trim($menus['ParentId']);
        //     $data['menu'][$ParentId][] = $menus;
        // }
        $this->view('setting/groups/add');     
    }

	public function edit() {
        $IdGroups       = $_POST['IdGroups'];
        $data['groups'] = $this->model('Groups_model')->getGroupsById($IdGroups);
        // $menu = $this->model('Groups_model')->getMenuCheckByIdGroups($IdGroups);

        // foreach ($menu as $menus) {
        //     $ParentId = trim($menus['ParentId']);
        //     $data['menu'][$ParentId][] = $menus;
        // } 

        $this->view('setting/groups/edit', $data);   
    }

	public function ubah_status() {
        $setStatusGroups = $this->model('Groups_model')->setStatusGroups();

        if ($setStatusGroups) {
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

	// public function hapus_menu() {
 //        $setStatusGroups = $this->model('Groups_model')->delMenuFromAuthorize();

 //        if ($setStatusGroups) {
 //            echo json_encode(array(
 //                'result' => 'success'
 //            ));
 //        }
 //    }

	public function pushGroups() {
        $isNmGroupExist = $this->model('Groups_model')->isNmGroupExist(trim($_POST['NmGroups']));

        if (!$isNmGroupExist) {
            $Result = $this->model('Groups_model')->pushGroups();

            if ($Result) {
                Flasher::pushFlash('success', 'Groups berhasil ditambahkan');
                echo json_encode(array(
                    'result' => 'success'
                ));
            } 
        } else {
            echo json_encode(array(
                'result' => 'failed',
                'msg' => 'Nama group sudah tersedia!'
            ));
        }
    }

	public function setGroups() {
        $Result = $this->model('Groups_model')->setGroups();

        if ($Result) {
            Flasher::pushFlash('success', 'Groups berhasil diubah');
            echo json_encode(array(
                'result' => 'success'
            ));
        }
    }

	public function setModify() {
        $result = $this->model('Groups_model')->setModify();

        if ($result) {
            $result = array('result' => 'success');
        }
        else {
            $result = array('result' => 'failed');
        }

        echo json_encode($result);
    }

}