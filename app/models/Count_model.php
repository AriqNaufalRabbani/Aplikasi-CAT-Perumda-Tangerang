<?php
defined('BASE_PATH') OR exit('No direct script access allowed');



class Count_model extends Controller {
	private $db;

	public function __construct() {
		$this->db       = new Database;
        $this->UserID   = USERID;
        $this->KdSales  = INISIAL;

	}

    public function getCountPending($Module){
        if($Module == 'eappop'){
			$data["count"]    		= $this->model('eappop_model')->CountDataPending();
		}else if($Module == 'eappcr'){
			$data["count"]    		= $this->model('eappcr_model')->CountDataPending();
		}else if($Module == 'eapptm'){
			$data["count"]    		= $this->model('eapptm_model')->CountDataPending();
		}else if($Module == 'spkdapp'){
			$data["count"]    		= $this->model('SPKD_App_model')->CountDataPending();
		}else if($Module == 'spkcapp'){
			$data["count"]    		= $this->model('SPKC_App_model')->CountDataPending();
		}else if($Module == 'stock_fg'){
			$StockFG    			= $this->model('Stock_FG_model')->fetch();
			foreach($StockFG as $value){
				$tKirim	=	trim($value['tKirim']);
				$nobar	=	trim($value['nobar']);
	
				if($tKirim == ''){
					$PendingSFG[]	=	$nobar;
				}
			}
			$data["count"]			= count($PendingSFG);
		}else if($Module == 'mlclose'){
			$mlclose    			= $this->model('Mlclose_model')->fetch();
			$data["count"]			= count($mlclose);
		}else if($Module == 'eappga'){
			$eappga    				= $this->model('eappga_model')->CountData();
			$data["count"]			= $eappga["countBlm"];
		}else if($Module == 'analisareturn'){
			$analisareturn    		= $this->model('analisareturn_model')->CountData();
			$data["count"]			= $analisareturn["countBlm"];
		}else if($Module == 'eappcgs'){
			$data["count"]    		= $this->model('eappcgs_model')->CountDataPending();
			// $data["count"]			= $eappcgs["Pending"];
		}else if($Module == 'eappsf'){
			$data["count"]    		= $this->model('eappsf_model')->CountDataPending();
			// $data["count"]			= $eappsf["Pending"];
		}else if($Module == 'eappcrcl'){
			$data["count"]    		= $this->model('eappcrcl_model')->CountDataPending();
		}else{
			$data["count"]			= 0;
		}

        return (int) $data["count"];
    }
}