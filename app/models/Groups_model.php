<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Groups_model {
	private $db;

	public function __construct() {
		$this->db = new Database;
        $this->userid = USERID;
	}

	public function getAllGroups() {
        $Q = "
            SELECT  *
            FROM _CRM_Groups
            ORDER BY NmGroups ASC
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result['groups'] = $this->db->fetchAll();

  //       $Q = "
  //           select
  //                 a.IdGroups 
  //               , a.IdAuthorize
  //               , a.isModify
  //               , b.* 
  //           from _CRM_Authorize a
  //           JOIN _CRM_Menu b
  //               ON b.IdMenu = a.IdMenu
  //       ";
		// $this->db->prepare($Q);
		// $this->db->execute();
		// $result['menus'] = $this->db->fetchAll();

        return $result;
	}

	public function getGroups() {
        $Q = "
            SELECT  *
            FROM _CRM_Groups
            WHERE Aktif = 'Y'
            ORDER BY NmGroups ASC
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetchAll();

        return $result;
	}

	public function getGroupsById($IdGroups) {
        $Q = "
            SELECT  *
            FROM _CRM_Groups
            WHERE IdGroups = '$IdGroups'
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetch();

        return $result;
	}

    function isNmGroupExist($NmGroup = '') {
        $query = "
            SELECT jml = count(*)
            FROM _CRM_Groups
            WHERE NmGroups = '$NmGroup'
        ";
        $this->db->prepare($query);
        $this->db->execute();
        $fetch = $this->db->fetch();
        
        if (trim($fetch['jml']) > 0) {
            return true;
        } else {
            return false;
        }
    }

	public function pushGroups() {
        $NmGroups   = $_POST['NmGroups'];
        $Dashboard  = $_POST['Dashboard'];
        $Aktif      = $_POST['Aktif'];

        $Q = "
            INSERT INTO _CRM_Groups (
                  NmGroups
                , Dashboard
                , Aktif
                , CrtDt
                , CrtBy
                , UpdDt
                , UpdBy
            ) VALUES (
                  '$NmGroups'
                , '$Dashboard'
                , '$Aktif'
                , getdate()
                , '$this->userid'
                , getdate()
                , '$this->userid'
            )
        ";
		$this->db->prepare($Q);
		$result = $this->db->execute();
		// $fetch = $this->db->fetch();

        // if ($result) {
        //     $IdGroups = $fetch['IdGroups'];

        //     $Q = "
        //         INSERT INTO _CRM_Authorize (
        //             IdGroups
        //             , IdMenu
        //             , Aktif
        //             , isModify
        //             , CrtDt
        //             , CrtBy
        //             , UpdDt
        //             , UpdBy	
        //         ) VALUES
        //     ";
        //     $Coma = '';
        //     foreach ($_POST['IdMenu'] as $IdMenu) {
        //         $Q .= $Coma . "('$IdGroups', '$IdMenu', 'Y', 'Y', getdate(), '$this->userid', getdate(), '$this->userid')";
        //         $Coma = ',';
        //     }
        //     $this->db->prepare($Q);
        //     $result = $this->db->execute();
        // }

        return $result;
	}

	// public function getMenuCheckByIdGroups($IdGroups) {
 //        $Q = "
 //            select a.*
 //                , Checked = CASE WHEN b.IdGroups IS NOT NULL THEN 'checked' else '' END 
 //            from _CRM_Menu a
 //            LEFT JOIN _CRM_Authorize b
 //                ON b.IdMenu = a.IdMenu
 //                AND b.IdGroups = '$IdGroups'
 //            ORDER BY a.ParentId, a.SeqNo, a.NmMenu ASC
 //        ";
	// 	$this->db->prepare($Q);
	// 	$this->db->execute();
	// 	$result = $this->db->fetchAll();

 //        return $result;
	// }

    public function getGroupsByNmGroups($NmGroups){
        $Q = "
            SELECT *
            FROM _CRM_Groups
            WHERE NmGroups = '". trim($NmGroups) ."'
        ";
        $this->db->prepare($Q);
        $this->db->execute();
        return $this->db->fetch();
    }

	public function setGroups() {
        $IdGroups   = $_POST['IdGroups'];
        $NmGroups   = $_POST['NmGroups'];
        $Dashboard  = $_POST['Dashboard'];
        $Aktif      = $_POST['Aktif'];

        // if (count($_POST['IdMenu']) > 0) {
        //     $IdMenu = "'" . implode("','", $_POST['IdMenu']) . "'";

        //     $Q  = "
        //         BEGIN TRANSACTION
        //             UPDATE _CRM_Groups SET
        //                 NmGroups  = '$NmGroups'
        //                 , Dashboard = '$Dashboard'
        //                 , Aktif     = '$Aktif'
        //                 , UpdDt     = getdate()
        //                 , UpdBy     = '$this->userid'
        //             WHERE IdGroups = '$IdGroups';

        //             INSERT INTO _CRM_Authorize (IdGroups, IdMenu, Aktif, CrtDt, CrtBy, UpdDt, UpdBy)
        //                 SELECT 
        //                     IdGroups = '$IdGroups'
        //                     , a.IdMenu
        //                     , Aktif = 'Y'
        //                     , CrtDt = getdate()
        //                     , CrtBy = '$this->userid'
        //                     , UpdDt = getdate()
        //                     , UpdBy = '$this->userid'
        //                 FROM _CRM_Menu a
        //                 LEFT JOIN _CRM_Authorize b
        //                     ON b.IdMenu     = a.IdMenu
        //                     AND b.IdGroups  = '$IdGroups'
        //                 where 
        //                     a.IdMenu in (". $IdMenu .")
        //                     AND b.IdAuthorize IS NULL;
                        
        //             DELETE FROM _CRM_Authorize
        //             WHERE IdGroups = '$IdGroups'
        //                 AND IdMenu NOT IN (". $IdMenu .");
        //         COMMIT
        //     ";

        // }
        // else {
            $Q = "
                UPDATE _CRM_Groups SET
                    NmGroups  = '$NmGroups'
                    , Dashboard = '$Dashboard'
                    , Aktif     = '$Aktif'
                    , UpdDt     = getdate()
                    , UpdBy     = '$this->userid'
                WHERE IdGroups = '$IdGroups';
            ";
        // }
        $this->db->prepare($Q);
        $result = $this->db->execute();

        return $result;
	}

	public function setStatusGroups() {
        $IdGroups   = $_POST['Id'];
        $Aktif      = $_POST['Status'];

        $Q = "
            UPDATE _CRM_Groups SET
                  Aktif     = '$Aktif'
                , UpdDt     = getdate()
                , UpdBy     = '$this->userid'
            WHERE IdGroups = '$IdGroups'
        ";
		$this->db->prepare($Q);
		$result = $this->db->execute();

        return $result;
	}

	// public function delMenuFromAuthorize() {
 //        $IdAuthirize   = $_POST['Id'];

 //        $Q = "
	// 		delete _CRM_Authorize
	// 		where IdAuthorize = '$IdAuthirize'
 //        ";
	// 	$this->db->prepare($Q);
	// 	$result = $this->db->execute();

 //        return $result;
	// }

	// public function setModify() {
 //        $Id     = $_POST['pk'];
 //        $Column = $_POST['name'];
 //        $Value  = $_POST['value'];

 //        $Q = "
 //            UPDATE _CRM_Authorize SET
 //                  $Column   = '$Value'
 //                , UpdDt     = getdate()
 //                , UpdBy     = '$this->userid'
 //            WHERE IdAuthorize = '$Id'
 //        ";
	// 	$this->db->prepare($Q);
	// 	$result = $this->db->execute();

 //        return $result;
	// }
}