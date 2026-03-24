<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Login_model extends Controller {
	private $db;

	public function __construct() {
		$this->db = new Database;
	} 

	public function CheckLogin(){
		// $KdSales = $this->GetKdSales($_SESSION['userid']);

		// if(INISIAL != $KdSales){
		// 	session_destroy();
		// }

		if(isset($_SESSION['userid'])){
			$Login = 'Success';
		}else if(isset($_COOKIE['crm_logged_in'])){
			$NIKCookies 	= base64_decode($_COOKIE['crm_logged_in']);
			$ProcessLogin 	= $this->ProcessLogin($NIKCookies);

			if($ProcessLogin['result'] == 'success'){
				$Login = 'Success';
			}else{
				$Login = 'Failed';
			}
		}else{
			$Login = 'Failed';
		}

		return $Login;

	}

	public function ProcessLogin(){
		$session_lifetime = 60 * 60 * 24; // 24 jam

		// ini_set('session.gc_maxlifetime', $session_lifetime);
		// ini_set('session.cookie_lifetime', $session_lifetime);

		// session_set_cookie_params([
		// 	'lifetime' => $session_lifetime,
		// 	'path' => '/',
		// 	'secure' => false, // true kalau pakai HTTPS
		// 	'httponly' => true,
		// 	'samesite' => 'Lax'
		// ]);
		// session_start();

		$login    	= trim($_POST['username'] ?? ''); // bisa username / email
		$login 		= stripslashes(strip_tags(htmlspecialchars($login, ENT_QUOTES)));
		$password 	= trim($_POST['password'] ?? '');

		if ($login === '' || $password === '') {
			$Result = array(
				'result'    => 'error',
				'msg'	    => 'Username dan password wajib diisi',
			);
			return $Result;
		}

		$Query	=	"
			SELECT * FROM users 
			WHERE (username = :username OR email = :email)
			AND aktif = 'Y'
			LIMIT 1
		";
		$this->db->prepare($Query);
		$this->db->execute([
			'username' => $login,
			'email' => $login
		]);
		$user = $this->db->fetch();

		// $NIK 	= preg_replace("/[^a-zA-Z0-9]/", "", $NIK);
		// $NIK	= stripslashes(strip_tags(htmlspecialchars($NIK, ENT_QUOTES)));
		// $user 	= $this->model('Users_model')->getUsersByNIK($NIK);

		if (!$user) {
			$Result = array(
				'result'    => 'error',
				'msg'	    => 'User tidak ditemukan / tidak aktif!',
			);
			return $Result;
		}

		// ====== CEK PASSWORD ======
		if (!password_verify($password, $user['password'])) {
			$Result = array(
				'result'    => 'error',
				'msg'	    => 'Password salah!',
			);
			return $Result;
		}

		// ====== GENERATE TOKEN ======
		$token = bin2hex(random_bytes(32));

		// ====== SET SESSION ======
		$_SESSION['userid']   = $user['id'];
		$_SESSION['username']  = $user['username'];
		$_SESSION['fullname']  = $user['fullname'];
		$_SESSION['role']      = $user['role'];
		$_SESSION['token']     = $token;

		$_SESSION['login_time'] 	= time();
		$_SESSION['expire']     	= time() + $session_lifetime;
		$_SESSION['last_activity'] 	= time();

		// ====== UPDATE DB ======
		$Query	=	"
			UPDATE users 
			SET session_token = :token,
				upddt = NOW(),
				updby = :login
			WHERE id = :id
		";
		$this->db->prepare($Query);
		$update = $this->db->execute([
			'token' => $token,
			'login' => $login,
			'id'    => $user['id']
		]);

		if($update){
			$Result = array(
				'result'    => 'success',
				'msg'	    => 'Anda Berhasil Login!',
			);
			return $Result;
		}else{
			$Result = array(
				'result'    => 'error',
				'msg'	    => 'Anda Gagal Login!',
			);
			return $Result;
		}

		return $Result;
	}

	public function ProcessLogout(){
		// cek apakah user login
		if (isset($_SESSION['userid'])) {

			// hapus session_token di database (biar tidak bisa dipakai lagi)
			$Query = "
				UPDATE users 
				SET session_token = NULL,
					upddt = NOW(),
					updby = :username
				WHERE id = :id
			";
			$this->db->prepare($Query);
			$this->db->execute([
				'username' => $_SESSION['username'],
				'id'       => $_SESSION['userid']
			]);
		}

		// hapus semua session
		$_SESSION = [];

		// destroy session
		session_destroy();

		// hapus cookie session (lebih bersih 🔥)
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(
				session_name(),
				'',
				time() - 42000,
				$params["path"],
				$params["domain"],
				$params["secure"],
				$params["httponly"]
			);
		}
	}

	public function getUserByNIK() {
        $NIK = trim($_POST['nik']);

        $Q   = "SELECT DISTINCT TOP 1
					a.NIK
				,	a.Password
				,	a.IdGroups
				,	b.karyawan
				,	b.email
				,	c.NmGroups
				,	s.KdSales
			FROM _CRM_Users a	WITH (NOLOCK)
            JOIN hrta..karyawan b	WITH (NOLOCK)
				ON b.nik		=	a.NIK
			JOIN _CRM_Groups c	WITH (NOLOCK)
				ON c.IdGroups	=	a.IdGroups
			LEFT JOIN _Users u	WITH (NOLOCK)
				ON	u.UserId	=	a.NIK	
			LEFT JOIN ERP..Salesman s	WITH (NOLOCK)
				ON	s.kdsales	=	u.Inisial
				AND S.Aktif		=	'Y'
				AND S.KdSales	NOT IN ('E1','E2','E3')
			  WHERE a.nik =  '$NIK'
			  ORDER BY S.KdSales
			  DESC

        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$result = $this->db->fetch();

        return $result;
	}
}