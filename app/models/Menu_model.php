<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Menu_model {
	private $db;

	public function __construct() {
		$this->db = new Database;
        $this->userid = $_SESSION['userid'];
	}

	public function getAllMenu() {
        $Q = "
            SELECT  *
                ,   JnsMenu = CASE WHEN ParentId = 0 THEN 'Main Menu' ELSE 'Sub Menu' END
            FROM _CRM_Menu
            ORDER BY ParentId, SeqNo, NmMenu ASC
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetchAll();

        return $result;

	}

	public function getMenu() {
        $Q = "
            SELECT  *
                ,   JnsMenu = CASE 
                    WHEN ParentId = 0 THEN 
                        'Main Menu' 
                    ELSE 
                        'Sub Menu' 
                    END
            FROM _CRM_Menu
            WHERE Aktif = 'Y'
            ORDER BY ParentId, SeqNo, NmMenu ASC
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetchAll();

        return $result;

	}

	public function getMenuByGroupId() {
  //       $Q = "
  //           SELECT DISTINCT(ParentId), SeqNo, ParentMenu, ParentLink, ParentIcon FROM (
  //               SELECT 
  //                   b.NmMenu
  //                   , b.IdMenu 
  //                   , ParentId   = CASE WHEN b.ParentId IS NULL THEN 0 ELSE b.ParentId END
  //                   , ParentMenu = CASE WHEN c.NmMenu IS NULL THEN b.NmMenu ELSE c.NmMenu END
  //                   , SeqNo      = CASE WHEN c.SeqNo IS NULL THEN b.SeqNo ELSE c.SeqNo END
  //                   , ParentLink = CASE WHEN c.LinkMenu IS NULL THEN b.LinkMenu ELSE c.LinkMenu END
  //                   , ParentIcon =  CASE WHEN c.IconMenu IS NULL THEN b.IconMenu ELSE c.IconMenu END
  //               FROM _CRM_Authorize a
  //               JOIN _CRM_Menu b
  //                   ON a.IdMenu = b.IdMenu
  //               LEFT JOIN _CRM_Menu c
  //                   ON c.IdMenu = b.ParentId
  //               WHERE a.IdGroups = '". $_SESSION['IdGroups'] ."'
  //                   AND b.Aktif = 'Y'
  //           ) AS Menu
  //           ORDER BY SeqNo, ParentMenu, ParentId ASC
  //       ";
		// $this->db->prepare($Q);
		// $this->db->execute();
		// $result = $this->db->fetchAll();

        $Q = "
            SELECT DISTINCT(ParentId), SeqNo, ParentMenu, ParentLink, ParentIcon FROM (
                SELECT 
                    b.NmMenu
                    , b.IdMenu 
                    , ParentId   = CASE WHEN b.ParentId IS NULL THEN 0 ELSE b.ParentId END
                    , ParentMenu = CASE WHEN c.NmMenu IS NULL THEN b.NmMenu ELSE c.NmMenu END
                    , SeqNo      = CASE WHEN c.SeqNo IS NULL THEN b.SeqNo ELSE c.SeqNo END
                    , ParentLink = CASE WHEN c.LinkMenu IS NULL THEN b.LinkMenu ELSE c.LinkMenu END
                    , ParentIcon = CASE WHEN c.IconMenu IS NULL THEN b.IconMenu ELSE c.IconMenu END
                FROM _CRM_UserMenu a
                JOIN _CRM_Users aa 
                    ON aa.IdUser = a.IdUser
                JOIN _CRM_Menu b
                    ON a.IdMenu = b.IdMenu
                    AND B.AKTIF =   'Y'
                LEFT JOIN _CRM_Menu c
                    ON c.IdMenu = b.ParentId
                WHERE aa.NIK = '$this->userid'
            ) AS Menu
            ORDER BY SeqNo, ParentMenu, ParentId ASC
        ";
        $this->db->prepare($Q);
        $this->db->execute();
        $result = $this->db->fetchAll();

        return $result;

	}

	public function getSubMenuByGroupId() {
        $Q = "
            SELECT
                  a.isModify 
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
            ORDER BY b.SeqNo, b.NmMenu ASC
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetchAll();

        return $result;

	}

	public function getParentMenu() {
        $Q = "
            SELECT  *
            FROM _CRM_Menu
            WHERE Aktif = 'Y'
                AND ParentId = '0'
            ORDER BY SeqNo ASC, NmMenu ASC
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetchAll();

        return $result;

	}

	public function getMenuById($IdMenu) {
        $Q = "
            SELECT  *
                ,   JnsMenu = CASE WHEN ParentId = 0 THEN 'Main Menu' ELSE 'Sub Menu' END
            FROM _CRM_Menu
            WHERE IdMenu = '$IdMenu'
            AND AKTIF       ='Y'
            ORDER BY SeqNo ASC, NmMenu ASC
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetch();

        return $result;
	}

	public function getMenuByParentId($IdMenu) {
        $Q = "
            SELECT  *
                ,   JnsMenu = CASE WHEN ParentId = 0 THEN 'Main Menu' ELSE 'Sub Menu' END
            FROM _CRM_Menu
            WHERE ParentId = '$IdMenu'
            AND AKTIF   =   'Y'
            ORDER BY SeqNo ASC, NmMenu ASC
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetchAll();

        return $result;
	}

	public function pushMenu() {
        $JnsMenu = $_POST['JnsMenu'];
        $ParentId = $JnsMenu == 'M' ? 0 : $_POST['ParentId'];
        $NmMenu = $_POST['menu'];
        $Font   = $_POST['font'];
        if (empty($Font)) $Font = 'far fa-dot-circle';
        $Link   = $_POST['link'];
        $SeqNo  = $_POST['SeqNo'];
        $Aktif  = $_POST['aktif'];
        $Q = "
            INSERT INTO _CRM_Menu (
                ParentId
            ,   SeqNo
            ,   NmMenu
            ,   LinkMenu
            ,   StatusMenu
            ,   IconMenu
            ,   Aktif
            ,   CrtDt
            ,   CrtBy
            ,   UpdDt
            ,   UpdBy
            ) OUTPUT Inserted.IdMenu VALUES (
                '$ParentId'
            ,   '$SeqNo'
            ,   '$NmMenu'
            ,   '$Link'
            ,   '$JnsMenu'
            ,   '$Font'
            ,   '$Aktif'
            ,   getdate()
            ,   '". USERID ."'
            ,   getdate()
            ,   '". USERID ."'
            )
        ";
		$this->db->prepare($Q);
		$Result = $this->db->execute();

        return $Result;

	}

	public function setMenu() {
        $JnsMenu = $_POST['JnsMenu'];
        $ParentId = $JnsMenu == 'M' ? 0 : $_POST['ParentId'];
        $IdMenu = $_POST['IdMenu'];
        $NmMenu = $_POST['menu'];
        $Font   = $_POST['font'];
        if (empty($Font)) $Font = 'far fa-dot-circle';
        $Link   = $_POST['link'];
        $SeqNo  = $_POST['SeqNo'];
        $Aktif  = $_POST['aktif'];

        $Q = "
            UPDATE _CRM_Menu set 
                ParentId = '$ParentId'
            ,   StatusMenu = '$JnsMenu'
            ,   NmMenu   = '$NmMenu'
            ,   LinkMenu = '$Link'
            ,   IconMenu = '$Font'
            ,   SeqNo    = '$SeqNo'
            ,   Aktif    = '$Aktif'
            ,   UpdDt    = getdate()
            ,   UpdBy    = '". USERID ."'
            WHERE IdMenu = '$IdMenu'
        ";
		$this->db->prepare($Q);
		$Result = $this->db->execute();

        return $Result;
    }

	public function setStatusMenu() {
        $IdMenu = $_POST['IdMenu'];
        $Status = $_POST['Status'];

        $Q = "
            UPDATE _CRM_Menu set 
                Aktif    = '$Status'
            ,   UpdDt    = getdate()
            ,   UpdBy    = '". USERID ."'
            WHERE IdMenu = '$IdMenu'
        ";
		$this->db->prepare($Q);
		$Result = $this->db->execute();

        return $Result;
    }

	public function deleteMenu() {
        $IdMenu = $_POST['Id'];

        $Q = "
            DELETE _CRM_Menu
            WHERE IdMenu = '$IdMenu'
        ";
		$this->db->prepare($Q);
		$Result = $this->db->execute();

        return $Result;
    }
}