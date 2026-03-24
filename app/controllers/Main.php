<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Main extends Controller {

	public function menuFirewall() {
        $result = $this->model('Main_model')->menuFirewall();

        if (!$result) {
            Flasher::pushFlash('error', 'Anda tidak memiliki akses ke menu tersebut!');
            header("Location: " . BASE_URL);
        }
    } 
    
	public function getModifyMenu() {
        $this->model('Main_model')->getModifyMenu();
    }


	public function getMenu() {
		$menus['parentmenu'] = $this->model('Menu_model')->getMenuByGroupId();
		$SubMenu             = $this->model('Menu_model')->getSubMenuByGroupId();

        foreach ($SubMenu as $menu) {
            $ParentId = trim($menu['ParentId']);

            $menus['submenu'][$ParentId][] = $menu;
        }

		return $menus;
	}

	public function getNews() {
		$getNews = $this->model('News_model')->getNews();
		return $getNews;
    }    
    
	public function getUnreadNotifByUser() {
        $data['AllNotif']    = $this->model('Notifikasi_model')->get10AllNotif(USERID);
        $data['UnreadNotif'] = $this->model('Notifikasi_model')->getUnreadNotifByUser(USERID);
        
        return $data;
    } 

    
}