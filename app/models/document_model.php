<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class document_model {
	private $db;

	public function __construct() {
		$this->db = new Database;
        $this->userid = $_SESSION['userid'];
	}

	public function fetch() {
        $periode1 = $_POST['periode'];
        $thn      = substr($periode1, 2, 2);
        $bln      = substr($periode1, 5, 2);

        $query = "
            SELECT bm.Prd
            ,	bm.Groups
            ,	sls.NmSales
            ,	sls.KdSales
            ,	bm.SalesIDR
            ,	bm.MMIDR
            ,	bm.RunMTR
            from Budget_MKT bm	WITH (NOLOCK)
            INNER JOIN ERP..Salesman sls	WITH (NOLOCK)
                ON bm.KdSales	= sls.KdSales
            WHERE LEFT(bm.Prd, 2)           = '$thn'
                AND RIGHT(RTRIM(bm.prd), 2) = '$bln'
        ";

        /* get record total */
		$this->db->prepare($query);
		$this->db->execute();
		$recordsTotal = $this->db->fetchAll();
        $recordsTotal = count($recordsTotal);
        
        /* search filter */
        if (isset($_POST["search"]["value"])) {
            $value = '%' . trim($_POST["search"]["value"]) . '%';
            $query .= "
                AND (
                        bm.Groups LIKE '$value'
                    OR  bm.Prd LIKE '$value'
                    OR  bm.SalesIDR LIKE '$value'
                    OR  bm.MMIDR LIKE '$value'
                    OR  bm.RunMTR LIKE '$value'
                    OR  sls.NmSales LIKE '$value'
                    OR  sls.KdSales LIKE '$value'
                )
            ";
        }

        /* get total records filtered */
		$this->db->prepare($query);
		$this->db->execute();
		$recordsFiltered = $this->db->fetchAll();
        $recordsFiltered = count($recordsFiltered);

        /* set order */
        $columnList = array("bm.Groups", "sls.NmSales", "bm.Prd", "bm.SalesIDR", "bm.MMIDR ", "bm.RunMTR");
        if (isset($_POST["order"])) {
            $column = $columnList[$_POST['order']['0']['column']];
            $dir    = $_POST['order']['0']['dir'];

            $query .= "ORDER BY $column $dir";
        } else {
            $query .= "ORDER BY bm.Groups ASC";
        }

        /* set pagination and fetch */
        $start  = $_POST['start'];
        $length = $_POST['length'];
        $query .= "
            OFFSET $start ROWS FETCH NEXT $length ROWS ONLY
        ";
		$this->db->prepare($query);
		$this->db->execute();
		$fetch = $this->db->fetchAll();

        /* Prepare data */
		$data = array();
		foreach ($fetch as $cd) {
            $Prd		= trim($cd["Prd"]);
            $Groups		= trim($cd["Groups"]);
            $NmSales	= trim($cd["NmSales"]);
            $KdSales	= trim($cd["KdSales"]);
            $weeks		= substr(trim($cd["Prd"]),0,2);
            $bln 		= substr(trim($cd["Prd"]),2,2);
            $month_name = date('F, Y', mktime(0, 0, 0, $bln, 1, $weeks));
            $SalesIDR = number_format(trim($cd["SalesIDR"]));
            $MMIDR = number_format(trim($cd["MMIDR"]));
            $RunMTR = number_format(trim($cd["RunMTR"]));
            $r7 = array();

			if (ISMODIFY == 'Y') {
				$btnEdit = '
                    <div class="text-center">
                        <button class="btn btn-sm btn-warning" onclick="window.location.href = `'. BASE_URL .'document/edit/?prd='. $Prd .'&groups='. $Groups .'&kdsales='. $KdSales.'`"><i class="fa fa-pencil"></i></button>
                    </div>
                ';
			}
			else {
				$btnEdit = "";
			}
		
			array_push($data, array(
				  'G ' . $Groups
				, $NmSales
				, $month_name
				, $SalesIDR
				, $MMIDR
				, $RunMTR
				, $btnEdit
			));
        }

		$output = array(
			'draw'				=>	intval($_POST['draw']),
			'recordsTotal'		=>	$recordsTotal,
			'recordsFiltered'	=>	$recordsFiltered,
			'data'				=>	$data
		);

        return $output;
	}

	public function getEdit() {
        $prd 		= $_GET['prd'];
        $year		= '20'.''.substr($_GET['prd'],0,2);
        $bln 		= substr($_GET['prd'],2,2);
        $groups 	= $_GET['groups'];
        $kdsales 	= $_GET['kdsales'];

        $cekdata = "
            SELECT 	bm.Prd
            ,	bm.Groups
            ,	sls.NmSales
            ,	sls.KdSales
            ,	bm.SalesIDR
            ,	bm.MMIDR
            ,	bm.RunMTR
            ,	bm.UpdBy
            ,	bm.UpdDt
            from Budget_MKT bm	WITH (NOLOCK)
            INNER JOIN ERP..Salesman sls	WITH (NOLOCK)
                ON bm.KdSales	= sls.KdSales
            WHERE 	bm.Prd 		= '$prd'
                AND	bm.Groups	= '$groups'
                AND	bm.Kdsales	= '$kdsales'
        ";
		$this->db->prepare($cekdata);
		$this->db->execute();
		$Result = $this->db->fetch();

        return $Result;
	}

	public function process_edit() {
		$cari       = array('/[,]/', '/[* ]/'); 
		$ganti      = array('',''); 
		$prd 		= TRIM($_POST['prd']);
		$grup 		= TRIM($_POST['groups']);
		$kdsales 	= TRIM($_POST['kdsales']);
		$salesidr 	= preg_replace($cari,$ganti,TRIM($_POST['salesidr']));
		$mmidr 		= preg_replace($cari,$ganti,TRIM($_POST['mmidr']));
		$runmtr 	= preg_replace($cari,$ganti,TRIM($_POST['runmtr']));		
		
		$update =	"
            UPDATE Budget_MKT  SET 
                    SalesIDR	= '$salesidr'
                ,	MMIDR		= '$mmidr'
                ,	RunMTR		= '$runmtr'
                ,	UpdDt		= GETDATE()
                ,	UpdBy		= '$this->userid'
            WHERE 	Prd			= '$prd'
                AND	Groups		= '$grup'
                AND	KdSales		= '$kdsales'
        ";
		$this->db->prepare($update);
		$Result = $this->db->execute();
        return true;
	}

	public function cut_off_dboard_mkt() {
        $prd3 =  date("Y-m");

        $cekdata = "
            SELECT 	CutId
            ,	Prd 
            ,	mm
            ,	Rate = convert(numeric(24,0),rate)
            ,	UpdDt
            ,	UpdBy
            FROM cut_off_dboard_mkt	WITH (NOLOCK)
            WHERE 	LEFT(Prd,7) = '$prd3'
        ";        
		$this->db->prepare($cekdata);
		$this->db->execute();
		$Result = $this->db->fetch();

        return $Result;
	}

	public function post_actual() {
		$cari   	= array('/[,]/', '/[* ]/', '/[-]/'); 
		$ganti   	= array('','','');
		$prd 		= TRIM($_POST['prd']);
		$prd2 		= substr(TRIM($_POST['prd']),0,7);
		$prd3 		= $prd2."-%";
		$CutId 		= TRIM($_POST['CutId']);
		$mm 		= TRIM($_POST['mm']);
		$rate 		= preg_replace($cari,$ganti,TRIM($_POST['rateidr']));

		$idetil	 ="
            EXEC uspDelplanMKT_Actual
                    @coid   = '%'
                ,   @tgl    = '$prd'
                ,   @rate   = '$rate'
                ,   @tipemm = '$mm'
                ,   @userid = '$this->userid'
        ";
        // echo '<pre>'; print_r($idetil); exit;
		$this->db->prepare($idetil);
		$Result = $this->db->execute();
        return $Result;
	}

	public function post() {
		$cari   	= array('/[,]/', '/[* ]/', '/[-]/'); 
		$ganti   	= array('','','');		
		
		$prd 		= TRIM($_POST['prd']);
		$prd2 		= substr(TRIM($_POST['prd']),0,7);
		$prd3 		= $prd2."-%";
		$CutId 		= TRIM($_POST['CutId']);
		$mm 		= TRIM($_POST['mm']);
		$rate 		= preg_replace($cari,$ganti,TRIM($_POST['rateidr']));

		$idetil	 =" EXEC uspTargetMKT_Projection	";
		$idetil	.="		@coid	= '%'				";
		$idetil	.="	,	@tgldel	= '$prd3'			";
		$idetil	.="	,	@cRate	= '$rate'			";
		$idetil	.="	,	@tglcut	= '$prd'			";
		$idetil	.="	,	@tipemm	= '$mm'				";
		$idetil	.="	,	@userid	= '$this->userid'	";
        $this->db->prepare($idetil);
        $Result = $this->db->execute();
        return $Result;
        // return true;
	}

    public function upload_document(){
		$target = basename($_FILES['fupload']['name']);
		move_uploaded_file($_FILES['fupload']['tmp_name'], $target);
        $thn    = substr($_POST['thn'], 2, 2);

        $data = new Spreadsheet_Excel_Reader($_FILES['fupload']['name'], false);

		$baris = $data->rowcount($sheet_index=0);

		$year 	= date("y");

        for ($i	=3; $i	<=	$baris; $i++)
        {
            $barisreal 			= $baris-1;
            $k 					= $i-1;
            
            for ($m1 = 1; $m1	<=	12; $m1++)
            {
                
                if(strlen(trim($m1)) == 1)
                {
                    $m = '0'.$m1;
                }elseif(strlen(trim($m1)) == 2){
                    $m	= $m1;
                }
                
                $bsales	= 2+$m1;
                $bmm	= 15+$m1;
                $brun	= 28+$m1;
                $prd 	= $thn.$m;
                $week 	= date('W');
                
                $cari   = array('/[,]/', '/[* ]/'); 
                $ganti   = array('',''); 
                        
                $grups 	= trim($data->val($i,1));
                $sales 	= trim($data->val($i,2));
                $idr1  	= preg_replace($cari,$ganti,trim($data->val($i,$bsales)));
                $mm1   	= preg_replace($cari,$ganti,trim($data->val($i,$bmm)));
                $run1  	= preg_replace($cari,$ganti,trim($data->val($i,$brun)));
                            
                if($idr1 	== '' or empty($idr1))	{	$idr 	= 0;	}else{	$idr 	= $idr1;	}
                if($mm1 	== '' or empty($mm1))	{	$mm 	= 0;	}else{	$mm 	= $mm1;		}
                if($run1 	== '' or empty($run1))	{	$run 	= 0;	}else{	$run 	= $run1;	}

                if(!empty($sales))
                {
                    $insert = "INSERT INTO Budget_MKT 
                                        (	Prd
                                        ,	Groups
                                        ,	KdSales
                                        ,	SalesIDR
                                        ,	MMIDR
                                        ,	RunMTR
                                        ,	CrtDt
                                        ,	CrtBy
                                        ,	UpdDt
                                        ,	UpdBy
                                        ) 
                                VALUES
                                        (	'$prd'
                                    ,	'$grups'
                                    ,	'$sales'
                                    ,	'$idr'
                                    ,	'$mm'
                                    ,	'$run'
                                    ,	GETDATE()
                                    ,	'$this->userid'
                                    ,	GETDATE()
                                    ,	'$this->userid'
                                        )";
                    $this->db->prepare($insert);
                    $this->db->execute();
                }
            }
        }

        unlink($_FILES['fupload']['name']);
        return true;
    }

	public function Salesman() {		
		$update =	"
            SELECT grup.KdSalesGroup
                ,	man.KdSales
            FROM ERP..Salesman man	WITH (NOLOCK)
            INNER JOIN ERP..SalesGroup grup	WITH (NOLOCK)
                ON	man.GroupSales	= grup.GroupSales
            WHERE	man.Aktif		= 'Y'
        ";                    
		$this->db->prepare($update);
		$this->db->execute();
		$Result = $this->db->fetchAll();
        return $Result;
        // return true;
	}

}