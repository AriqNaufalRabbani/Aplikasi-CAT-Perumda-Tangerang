<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Users_model {
	private $db;

	public function __construct() {
		$this->db = new Database;
        $this->userid = USERID;
	}

	public function getAllUsers() {
        $Q   = "
            SELECT 
                DISTINCT
                  a.Aktif
                , a.IdUser
                , b.nik
                , b.karyawan
                , c.NmGroups
                , s.kdsales
            FROM _CRM_Users a
            JOIN hrta..karyawan b
                ON b.nik = a.NIK
            LEFT JOIN _CRM_Groups c
                ON c.IdGroups = a.IdGroups
            LEFT JOIN hrta..users d	WITH (NOLOCK)
                ON d.id_users = a.NIK
            LEFT JOIN _Users u	WITH (NOLOCK)
				ON	u.UserId	=	a.NIK	
                AND U.Inisial	NOT IN ('E1','E2','E3') 
			LEFT JOIN ERP..Salesman s	WITH (NOLOCK)
				ON	s.kdsales	=	u.Inisial
				AND S.Aktif		=	'Y'
				AND S.KdSales	NOT IN ('E1','E2','E3')
            WHERE A.AKTIF = 'Y'

            UNION ALL
            
            SELECT  
                  a.Aktif
                , a.IdUser
                , a.nik
                , karyawan = 'TRIAL'
                , c.NmGroups
                ,   kdsales = ''
            FROM _CRM_Users a
            LEFT JOIN _CRM_Groups c
                ON c.IdGroups = a.IdGroups
            WHERE   a.aktif = 'Y'
                AND a.CRTBY = 'RS' 

            ORDER BY karyawan ASC
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetchAll();

        return $result;
	}

    public function getUserMenu() {
        $Q   = "
            SELECT  a.IdUser
                ,   c.IdMenu
                ,   c.NmMenu
                ,   ParentId   = ISNULL(d.IdMenu, c.IdMenu)
                ,   ParentMenu = ISNULL(d.NmMenu, c.NmMenu)
            FROM _CRM_Users a
            JOIN _CRM_UserMenu b
                ON a.IdUser = b.IdUser
            JOIN _CRM_Menu c
                ON c.IdMenu = b.IdMenu
            LEFT JOIN _CRM_Menu d 
                ON d.IdMenu = c.ParentId
            WHERE A.AKTIF  =   'Y'
        ";
        $this->db->prepare($Q);
        $this->db->execute();
        $result = $this->db->fetchAll();

        $res = array();
        foreach ($result as $data) {
            $IdUser     = trim($data['IdUser']);
            $ParentId   = trim($data['ParentId']);
            $ParentMenu = trim($data['ParentMenu']);

            // if (!isset($res[$IdUser]['ListParentId'][$ParentId])) {
            //     $res[$IdUser]['ListParentId'][] = array(
            //         'ParentId' => $ParentId,
            //         'ParentMenu' => $ParentMenu
            //     );  
            // }
            $res[$IdUser]['ListParentId'][$ParentId] = $ParentMenu;
            $res[$IdUser][$ParentId][] = $data;
        }

        return $res;
    }

	public function getUsersByNIK($NIK = '') {
        $Q = "
            SELECT a.*
                , b.karyawan
                , c.IdGroups 
                , c.NmGroups 
                , c.Dashboard
                , d.password
                , s.kdsales
                , dp.id_department as id_section
                , dp2.id_department
            FROM _CRM_Users a 	WITH (NOLOCK)
            JOIN hrta..karyawan b	WITH (NOLOCK)
                ON b.nik = a.NIK 
            JOIN hrta..department dp
                ON b.id_department = dp.id_department
            JOIN hrta..department dp2
                ON dp.parentid = dp2.id_department
            LEFT JOIN _CRM_Groups c WITH (NOLOCK)
                ON c.IdGroups = a.IdGroups
            LEFT JOIN hrta..users d	WITH (NOLOCK)
                ON d.id_users = a.NIK
            LEFT JOIN _Users u	WITH (NOLOCK)
				ON	u.UserId	=	a.NIK	
                AND U.Inisial	NOT IN ('E1','E2','E3') 
			LEFT JOIN ERP..Salesman s	WITH (NOLOCK)
				ON	s.kdsales	=	u.Inisial
				AND S.Aktif		=	'Y'
				AND S.KdSales	NOT IN ('E1','E2','E3')
            WHERE a.NIK = '$NIK'
            AND A.AKTIF  =   'Y'
        "; 

		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetch();

        return $result;
	}

    public function getUserMenuByNIK($NIK = '') {
        $Q   = "
            SELECT  a.IdUser
                ,   c.*
                ,   Checked = CASE 
                    WHEN a.IdUser IS NOT NULL THEN 
                        'checked' 
                    ELSE 
                        '' 
                    END 
            FROM _CRM_Users a
            RIGHT JOIN _CRM_UserMenu b
                ON a.IdUser = b.IdUser
            RIGHT JOIN _CRM_Menu c
                ON c.IdMenu = b.IdMenu
                AND a.nik = '$NIK'
            WHERE c.Aktif = 'Y'
        ";
        $this->db->prepare($Q);
        $this->db->execute();
        $result = $this->db->fetchAll();

        return $result;
    }

	public function getUserByNIK() {
        $NIK = $_POST['nik'];
        $Q   = "
            SELECT * 
            FROM hrta..karyawan
            WHERE nik = '$NIK'
            AND AKTIF = 'Y'
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetch();

        return $result;
	}

	public function getKaryawanByName($NmKaryawan = '') {
        $Karyawan = '%' . trim($NmKaryawan) . '%';
        $Q   = "
            SELECT TOP 10 b.* 
            FROM _CRM_Users a
            RIGHT JOIN hrta..karyawan b
                ON b.nik = a.NIK
            WHERE a.nik is null 
                AND b.aktif       = 'Y' 
                AND b.karyawan LIKE '$Karyawan'
            ORDER BY karyawan ASC
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetchAll();

        return $result;
	}

	public function getKaryawanActive() {
        $Q   = "
            SELECT * 
            FROM hrta..karyawan
            WHERE Aktif = 'Y'
            ORDER BY karyawan ASC
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetchAll();

        return $result;
	}

	public function pushUsers() {
        $IdGroups = $_POST['IdGroups'];
        // $Password = password_hash('123', PASSWORD_BCRYPT);
        $Password = '123';

        $Coma = '';
        foreach ($_POST['Users'] as $NIK) {
            $Q   = "
                INSERT INTO _CRM_Users (
                      NIK
                    , Password
                    , IdGroups
                    , Aktif
                    , CrtDt
                    , CrtBy
                    , UpdDt
                    , UpdBy
                    , email
                    , phone
                    , pict
                    , alamat
                ) OUTPUT 
                    INSERTED.IdUser 
                VALUES (
                      '$NIK'
                    , '$Password'
                    , '$IdGroups'
                    , 'Y'
                    , getdate()
                    , '$this->userid'
                    , getdate()
                    , '$this->userid'
                    , (SELECT email FROM hrta..karyawan WHERE nik = '$NIK')
                    , (SELECT phone FROM hrta..karyawan WHERE nik = '$NIK')
                    , ''
                    , (SELECT alamat FROM hrta..karyawan WHERE nik = '$NIK')
                )
            ";
            $this->db->prepare($Q);
            $this->db->execute();
            $fetch  = $this->db->fetch();
            $IdUser = trim($fetch['IdUser']);

            foreach ($_POST['IdMenu'] as $IdMenu) {
                $insUserMenu = "
                    INSERT INTO _CRM_UserMenu (
                            IdUser
                        ,   IdMenu
                        ,   CrtDt
                        ,   CrtBy
                        ,   UpdDt
                        ,   UpdBy
                        ,   isModify
                    ) VALUES (
                            '$IdUser'
                        ,   '$IdMenu'
                        ,   GETDATE()
                        ,   '$this->userid'
                        ,   NULL
                        ,   NULL
                        ,   'Y'
                    )
                ";
                $this->db->prepare($insUserMenu);
                $this->db->execute();
                $this->db->fetch();
            }
        }

        return true;
	}

	public function setUsers() {
        $IdUser     = $_POST['IdUser'];
        $NIK        = $_POST['NIK'];
        $IdGroups   = $_POST['IdGroups'];
        $Aktif      = $_POST['Aktif'];
        $arrIdMenu  = $_POST['IdMenu'];
        $impIdMenu  = implode("','", (array)$_POST['IdMenu']);

        $query = "
            UPDATE _CRM_Users SET
                IdGroups = '$IdGroups'
            ,   Aktif   = '$Aktif'
            ,   UpdDt   = getdate()
            ,   UpdBy   = '$this->userid'
            WHERE NIK = '$NIK';

            DELETE _CRM_UserMenu
            WHERE   IdUser = '$IdUser'
                AND IdMenu NOT IN ('$impIdMenu');

            INSERT INTO _CRM_UserMenu (
                    IdUser
                ,   IdMenu
                ,   CrtDt
                ,   CrtBy
                ,   UpdDt
                ,   UpdBy
                ,   isModify
            ) SELECT 
                    '$IdUser'
                ,   a.IdMenu
                ,   GETDATE()
                ,   '$this->userid'
                ,   GETDATE()
                ,   '$this->userid'
                ,   'Y'
            FROM _CRM_Menu a
            LEFT JOIN _CRM_UserMenu b
                ON b.IdMenu = a.IdMenu
                AND b.IdUser = '$IdUser'
            WHERE   a.IdMenu IN ('$impIdMenu')
                AND b.IdMenu IS NULL;
        "; 
        $query = "
            BEGIN TRANSACTION
                $query
            COMMIT
        ";
        $this->db->prepare($query);
        $result = $this->db->execute();
        return $result;
    }

	public function setStatusUser() {
        $NIK     = $_POST['NIK'];
        $Status  = $_POST['Status'];

        $Q = "
            UPDATE _CRM_Users SET
                Aktif   = '$Status'
            ,   UpdDt   = getdate()
            ,   UpdBy   = '$this->userid'
            WHERE NIK   = '$NIK'
        ";
		$this->db->prepare($Q);
		$result = $this->db->execute();

        return $result;
    }

	public function setPasswordUsers() {
        $NIK     = $_POST['Id'];
        // $Password = password_hash('123', PASSWORD_BCRYPT);
        $Password = '123';

        $Q = "
            UPDATE _CRM_Users SET
                Password = '$Password'
            ,   UpdDt    = getdate()
            ,   UpdBy    = '$this->userid'
            WHERE NIK    = '$NIK'
        ";
		$this->db->prepare($Q);
		$result = $this->db->execute();

        return $result;
    }

	public function getProfileByNIK($NIK = '') {
        $Q = "
            SELECT *
            FROM _CRM_Users a 
            WHERE a.NIK = '$NIK'
            AND A.AKTIF = 'Y'
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetch();

        return $result;
	}

	public function setProfile($NIK = '') {
        $email    = $_POST['email'];
        $phone    = $_POST['phone'];
        $alamat   = htmlspecialchars($_POST['alamat']);
        $password = $_POST['password'];
        
        if ($password != '') {
            // $password = password_hash($password, PASSWORD_BCRYPT);
            $passQuery = ",   Password    = '$password'";
        }

        if ($_FILES['pict']['tmp_name']) {
            $PictName = $NIK . '.' . pathinfo($_FILES['pict']['name'], PATHINFO_EXTENSION);

            move_uploaded_file($_FILES['pict']['tmp_name'], 'cdn/images/users/' . $PictName);
            $_SESSION['userpict'] = $PictName;
        }
        else {
            $PictName = $_POST['tmpPict'];
        }

        $Q = "
            UPDATE _CRM_Users SET
                email   = '$email'
            ,   phone   = '$phone'
            ,   alamat  = '$alamat'
            ,   pict    = '$PictName'
            ,   UpdDt   = getdate()
            ,   UpdBy   = '$this->userid'
            $passQuery
            WHERE NIK = '$NIK'
        ";
		$this->db->prepare($Q);
		$result = $this->db->execute();

        return $result;
    }

    public function PushLogs($UserID, $KdSales, $Category, $Logs, $Module = ''){
        $Query  = "
            INSERT INTO [dbo].[CRM_Logs]
                (   [UserID]
                ,   [KdSales]
                ,   [Category]
                ,   [Module]
                ,   [Logs]
                ,   [CrtDt]
                ,   [CrtBy])
            VALUES(
                    '$UserID'
                ,   '$KdSales'
                ,   '$Category'
                ,   '$Module'
                ,   '$Logs'
                ,   GETDATE()
                ,   'System'
            )
        ";

        $this->db->prepare($Query);
		return $this->db->execute();
    }
}