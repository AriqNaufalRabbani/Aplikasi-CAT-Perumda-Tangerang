<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Menu extends Controller {

	public function index() {
        $result = $this->model('Menu_model')->getAllMenu();
        foreach ($result as $menu) {
            $IdMenu = trim($menu['IdMenu']);
            $ParentId = trim($menu['ParentId']);

            $data['menu'][$ParentId][] = $menu;
        }
        $this->view('templates/header');
        $this->view('setting/menu/index', $data);
        $this->view('templates/footer');
    }

	public function add() {
        $data['parentmenu'] = $this->model('Menu_model')->getParentMenu();
        $this->view('setting/menu/add', $data);
	}

	public function edit() {
        $IdMenu = $_POST['IdMenu'];
        $data['menu'] = $this->model('Menu_model')->getMenuById($IdMenu);
        $data['parentmenu'] = $this->model('Menu_model')->getParentMenu();
        $data['submenu'] = $this->model('Menu_model')->getMenuByParentId($IdMenu);
        $this->view('setting/menu/edit', $data);
    }

	public function ubah_status() {
        $setStatusMenu = $this->model('Menu_model')->setStatusMenu();

        if ($setStatusMenu) {
            echo json_encode(array(
                'result' => 'success'
            ));
        }
    }

	public function delete() {
        $deleteMenu = $this->model('Menu_model')->deleteMenu();

        if ($deleteMenu) {
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

	public function pushMenu() {
        $Result = $this->model('Menu_model')->pushMenu();

        if ($Result) {
            Flasher::pushFlash('success', 'Menu berhasil ditambahkan');
            echo json_encode(array(
                'result' => 'success'
            ));
        }
    }

	public function setMenu() {
        $Result = $this->model('Menu_model')->setMenu();

        if ($Result) {
            Flasher::pushFlash('success', 'Menu berhasil diubah');
            echo json_encode(array(
                'result' => 'success'
            ));
        }
    }

    public function getSearch() {
        $getSearch = $this->model('Main_model')->getSearch();


		echo json_encode($getSearch);
    }

}