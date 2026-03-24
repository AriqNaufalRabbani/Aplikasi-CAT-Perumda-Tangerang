<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Settings extends Controller {

	public function CheckonNoty() {
        $result = $this->model('Settings_model')->CheckonNoty();

        echo json_encode($result);
    } 

    public function UpdateonNoty() {
        $result = $this->model('Settings_model')->UpdateonNoty();

        echo json_encode($result);
    } 
}