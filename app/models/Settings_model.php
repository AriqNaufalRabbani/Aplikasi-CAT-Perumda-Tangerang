<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Settings_model {
	private $db;

	public function __construct() {
		$this->db = new Database;
	}

	public function CheckonNoty() {
        $UserId =   USERID;

        $Query  =   "
        SELECT onNoty FROM  _CRM_Users 
            WHERE NIK = '$UserId' 
            AND Aktif = 'Y'
        ";

        $this->db->prepare($Query);
		$this->db->execute();
		$Data = $this->db->fetch();

        return trim($Data['onNoty']);
    }

    public function UpdateonNoty() {
        $UserId =   USERID;
        $value  =   trim($_POST['value']);

        $Query  =   "
        UPDATE _CRM_Users SET onNoty = '$value'
            WHERE NIK = '$UserId' 
            AND Aktif = 'Y'
        ";

        $this->db->prepare($Query);
		$Exec = $this->db->execute();

        return $Exec;
    }
}