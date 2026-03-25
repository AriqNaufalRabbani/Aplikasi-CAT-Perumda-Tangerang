<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Dashboard_model {
	private $db;
	private $userid;

	public function __construct() {
		$this->db 	 = new Database;
		$this->userid = $_SESSION['userid'];
	}

	public function getDashboard() {
		$Q = "SELECT * FROM _CRM_Groups	WITH (NOLOCK) WHERE IdGroups = '". IDGROUPS ."'";
		$this->db->prepare($Q);
		$this->db->execute();
		return $this->db->fetch();
	}

	public function CardApp(){
		$Query	=	"
			SELECT * FROM (
				SELECT
					Urut = 1
					, a.isModify 
					, b.NmMenu
					, b.IdMenu 
					, ParentId = CASE WHEN b.ParentId IS NULL THEN 0 ELSE b.ParentId END
					, ParentMenu = CASE WHEN c.NmMenu IS NULL THEN b.NmMenu ELSE c.NmMenu END
					, b.SeqNo
					, b.LinkMenu
					, b.IconMenu
				FROM _CRM_UserMenu a
				JOIN _CRM_Menu b
					ON a.IdMenu = b.IdMenu
					AND b.AKTIF =   'Y'
				JOIN _CRM_Users aa 
					ON aa.IdUser = a.IdUser
				LEFT JOIN _CRM_Menu c
					ON c.IdMenu = b.ParentId
					AND c.AKTIF =   'Y'
				WHERE aa.NIK = '$this->userid'
					AND b.ParentId != 0
					AND b.Aktif = 'Y'
					AND b.IdMenu IN ('82','83')
				UNION 
				SELECT
					Urut = 2
					, a.isModify 
					, b.NmMenu
					, b.IdMenu 
					, ParentId = CASE WHEN b.ParentId IS NULL THEN 0 ELSE b.ParentId END
					, ParentMenu = CASE WHEN c.NmMenu IS NULL THEN b.NmMenu ELSE c.NmMenu END
					, b.SeqNo
					, b.LinkMenu
					, b.IconMenu
				FROM _CRM_UserMenu a
				JOIN _CRM_Menu b
					ON a.IdMenu = b.IdMenu
					AND b.AKTIF =   'Y'
				JOIN _CRM_Users aa 
					ON aa.IdUser = a.IdUser
				LEFT JOIN _CRM_Menu c
					ON c.IdMenu = b.ParentId
					AND c.AKTIF =   'Y'
				WHERE aa.NIK = '$this->userid'
					AND b.ParentId != 0
					AND b.Aktif = 'Y'
					AND b.ParentId = '63'
			) as Tb ORDER BY Urut, SeqNo, NmMenu ASC
		";

		$this->db->prepare($Query);
		$this->db->execute();
		return $this->db->fetchAll();
	}

}