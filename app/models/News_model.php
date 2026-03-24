<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class News_model {
	private $db;

	public function __construct() {
		$this->db 	  = new Database;
        $this->userid = USERID; 
	}

	public function getNews() {
        $Q = "
			SELECT *
			FROM _CRM_News
			WHERE Aktif	= 'Y'
			ORDER BY CrtDt DESC
		";
		$this->db->prepare($Q);
		$this->db->execute();
		return $this->db->fetchAll();
	}

	public function getAllNews() {
        $Q = "
			SELECT *
			FROM _CRM_News
			ORDER BY CrtDt DESC
		";
		$this->db->prepare($Q);
		$this->db->execute();
		return $this->db->fetchAll();
	}

	public function pushNews() {
        $News  = $_POST['News'];
        $Aktif = $_POST['Aktif'];

        $Q = "
			INSERT INTO _CRM_News (
                  News
                , Aktif
                , CrtDt
                , CrtBy
                , UpdDt
                , UpdBy
            ) VALUES (
                  '$News'
                , '$Aktif'
                , getdate()
                , '$this->userid'
                , getdate()
                , '$this->userid'
            )
		";
		$this->db->prepare($Q);
		return $this->db->execute();
	}

	public function setNews() {
        $Id     = $_POST['pk'];
        $Column = $_POST['name'];
        $Value  = $_POST['value'];

        $Q = "UPDATE _CRM_News SET $Column = '$Value', UpdDt = getdate(), UpdBy = '$this->userid' WHERE IdNews = '$Id'";
		$this->db->prepare($Q);
		return $this->db->execute();
	}
}