<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class footer_menu_model {
	private $db;
 
	public function __construct() {
		$this->db = new Database;
	}

    public function MenuModal($IdMenu) {
        $UserID = USERID;
        $query = "
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
                JOIN _CRM_Users aa 
                ON aa.IdUser = a.IdUser
                LEFT JOIN _CRM_Menu c
                ON c.IdMenu = b.ParentId
                WHERE aa.NIK = '$UserID'
                AND b.ParentId != 0
                AND b.ParentId = '$IdMenu'
                AND b.Aktif = 'Y'
                ORDER BY b.SeqNo, b.NmMenu ASC
        ";

        $data .= "<div class='modal-content' style='height:100%;'>
                        <div class='modal-header'>
                            <button type='button' class='close' style='float:left;' data-dismiss='modal' aria-hidden='true'>
                                <i class='fa fa-arrow-left animate__animated animate__rotateIn' aria-hidden='true'></i>&nbsp; Back to Menu
                            </button>
                        </div>
                        <div class='modal-body'>
                            <ul class='list-group animate__animated animate__fadeInUp'>
                                
                            ";
                    

        $this->db->prepare($query);
		$this->db->execute();
		$fetch = $this->db->fetchAll();

        foreach ($fetch as $dataMn) {
            $IdMenu         = trim($dataMn["IdMenu"]);
            $NmMenu         = trim($dataMn["NmMenu"]);
            $LinkMenu       = trim($dataMn["LinkMenu"]);
            $IconMenu       = trim($dataMn["IconMenu"]);

            $pisah          = explode(' ', $NmMenu);
            $KtPertama      = $pisah[0];

            $data .= "
            <li class='list-group-item listFootMenu' style=' margin-left: 0px; width:100%;'>
                <a href='".BASE_URL.$LinkMenu."' class='btn' style='font-size:18px; text-align:justify;'>
                    <i class='".$IconMenu."' aria-hidden='true'></i> &nbsp;".$NmMenu."
                </a>
            </li>
                        ";
		}

        $data .="</ul>
            </div>
        </div>";

        return $data;
    }

	public function getFooterMenu() {
        $userid = USERID;
        // exit;
        $query = "
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
            LEFT JOIN _CRM_Menu c
                ON c.IdMenu = b.ParentId
            WHERE aa.NIK = '$userid'
   
        ) AS Menu
        WHERE
        ParentId != '1'
        ORDER BY SeqNo, ParentMenu, ParentId ASC
        ";

		$this->db->prepare($query);
		$this->db->execute();
		$fetch = $this->db->fetchAll();

        // return $fetch;

        /* Prepare data */
		$data .= "<div class='row mx-0 justify-content-center'>
                    <div class='col-sm-12 col-md-12'>
                        <ul class='nav navbar-light justify-content-around' style='text-align:center;'>
                            <li class='nav-item' >
                                <a class='nav-link active' aria-current='page' href='/dashboard'>
                                    <span class='d-block'>
                                        <svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                            <path d='M8.98398 20.7733V17.7156C8.98398 16.9351 9.65492 16.3023 10.4826 16.3023H13.508C13.9055 16.3023 14.2866 16.4512 14.5677 16.7162C14.8487 16.9813 15.0066 17.3408 15.0066 17.7156V20.7733C15.0041 21.0978 15.139 21.4099 15.3814 21.6402C15.6239 21.8705 15.9537 22 16.2978 22H18.3619C19.3259 22.0023 20.2513 21.6428 20.9339 21.0008C21.6164 20.3588 22 19.487 22 18.5778V9.86685C22 9.13246 21.6548 8.43584 21.0575 7.96467L14.0358 2.67587C12.8144 1.74856 11.0643 1.7785 9.87936 2.74698L3.01791 7.96467C2.39236 8.42195 2.01848 9.12063 2 9.86685V18.5689C2 20.4638 3.62882 22 5.63808 22H7.65504C8.36971 22 8.95052 21.4562 8.9557 20.7822L8.98398 20.7733Z' fill='#2B3A91'/>
                                            </svg>
                                    </span><br>
                                    <span style='font-size:10px;'>Home</span>
                                </a>
                            </li>
                            
                        ";
		foreach ($fetch as $dataMn) {
            $IdMenu         = trim($dataMn["ParentId"]);
            $NmMenu         = trim($dataMn["ParentMenu"]);
            $IconMenu       = trim($dataMn["ParentIcon"]);

            $pisah          = explode(' ', $NmMenu);
            $KtPertama      = $pisah[0];

            $data .= "<li class='nav-item'>
                        <a class='nav-link modal_menu' aria-current='page' href='#' id='".$IdMenu."'>
                            <span class='d-block'>
                                <i class='".$IconMenu."' style='font-size: 24px; color: #2b3a91;' aria-hidden='true'></i>
                            </span><br>
                            <span style='font-size:10px;'>".$KtPertama."</span>
                        </a>
                    </li>";
		}
        $data   .= "</ul>
                </div>
            </div>";


        return $data;
	}
}
?>