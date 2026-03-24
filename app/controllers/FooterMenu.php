<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class FooterMenu extends Controller {

	public function MenuModal() {
        $IdMenu = $_POST['IdMenu'];
		$result = $this->model('footer_menu_model')->MenuModal($IdMenu);
		// $data['fetch'] = $this->model('e_tm_model')->fetch();

		// echo json_encode($result);
        echo $result;
		// $this->view('e_tm', $data);
    }

    public function getFooterMenu() {
		$result = $this->model('footer_menu_model')->getFooterMenu();
		// $data['fetch'] = $this->model('e_tm_model')->fetch();

		// echo json_encode($result);
        echo $result;
		// $this->view('e_tm', $data);
    }
}
?>