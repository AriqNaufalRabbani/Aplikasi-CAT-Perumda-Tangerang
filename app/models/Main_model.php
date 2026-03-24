<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Main_model {
	private $db;
    private $userid;
    private $c_menu;

	public function __construct() {
		$this->db 	  = new Database;
        $this->userid = USERID;
        $this->c_menu = C_NAME;
	}

	public function menuFirewall() {
        $Q = "
            SELECT * 
            FROM _CRM_Menu a
            WHERE a.LinkMenu = '$this->c_menu'
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$isMenuExist = $this->db->fetch();

        if ($isMenuExist) {
            $Q = "
                SELECT *
                FROM _CRM_Menu a
                JOIN _CRM_Authorize b
                    ON b.IdMenu = a.IdMenu
                WHERE a.LinkMenu = '$this->c_menu'
                    AND b.IdGroups = '". IDGROUPS ."'
            ";
            $Q = "
                SELECT a.NmMenu
                FROM _CRM_Menu a
                JOIN _CRM_UserMenu b
                    ON b.IdMenu = a.IdMenu
                JOIN _CRM_Users c
                    ON c.IdUser = b.IdUser
                WHERE c.NIK = '$this->userid'
                    AND a.LinkMenu = '$this->c_menu'
            ";
            $this->db->prepare($Q);
            $this->db->execute();
            $data = $this->db->fetch();

            if (!$data) return false;

            define('NMMENU', trim($data['NmMenu']));
            return true;
        } else {
            return true;
        }
	}

	public function getModifyMenu() {
        $Q = "
            SELECT *
            FROM _CRM_Menu a
            JOIN _CRM_Authorize b
                ON b.IdMenu = a.IdMenu
            WHERE a.LinkMenu = '$this->c_menu'
                AND b.IdGroups = '". IDGROUPS ."'
        ";
        $Q = "
            SELECT b.isModify
            FROM _CRM_Menu a
            JOIN _CRM_UserMenu b
                ON b.IdMenu = a.IdMenu
            JOIN _CRM_Users c
                ON c.IdUser = b.IdUser
            WHERE   c.NIK       = '$this->userid'
                AND a.LinkMenu  = '$this->c_menu'
        ";
        $this->db->prepare($Q);
        $this->db->execute();
        $result = $this->db->fetch();

        define('ISMODIFY', trim($result['isModify']));
	}

    public function getSearch() {
        $UserID = USERID;
        $Q = "
            SELECT 
                SubMenu = c.NmMenu
            ,	IdSubMenu = c.IdMenu
            ,	IconMenu = c.IconMenu
            ,	LinkMenu = c.LinkMenu
            FROM _CRM_UserMenu	a
            JOIN _CRM_Users		b
            ON a.IdUser = b.IdUser
            JOIN _CRM_Menu		c
            ON a.IdMenu	= c.IdMenu
            WHERE b.Aktif = 'Y'
            AND c.Aktif = 'Y'
            AND b.NIK = '$UserID'
            ORDER BY SubMenu
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetchAll();

        $data = array();

        foreach ($result as $Sub){     
            $SubMenu    = trim($Sub['SubMenu']);
            $IdSubMenu  = trim($Sub['IdSubMenu']);
            $IconMenu   = trim($Sub['IconMenu']);
            $LinkMenu   = trim($Sub['LinkMenu']);

            $data['pages'][] = array(
                "name"      => $SubMenu,
                "icon"      => $IconMenu,
                "url"       => $LinkMenu,
            );
            
        }   

        return $data;
    }

}