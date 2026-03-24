<?php

class App{

	protected $controller = 'Login';
	protected $method 	  = 'index';
	protected $params 	  = array();
	protected $lang		  = array('id', 'en');

	public function __construct(){
		$url = $this->parseURL();

		$url = ($url === NULL) ? array("login") : $url;

		/* Define controller name */
		define('C_NAME', $url[0]);
		// Replace - with _ in url
		$url[0] = str_replace('-', '_', $url[0]);

		
		// If controller exist, call controller
		if ($this->fileExists('app/controllers/' . $url[0] . '.php')) {
			$this->controller = $url[0];
			unset($url[0]);
		}
		// If controller does'n exist, call PageNotFound
		else {
			// $this->controller = 'PageNotFound';
			// unset($url[0]);

			// if (file_exists('app/controllers/' . strtolower($url[0]) . '.php')) {
			// 	$this->controller = strtolower($url[0]);
			// 	unset($url[0]);
			// }
			// If controller does'n exist, call PageNotFound
			// else {
				$this->controller = 'PageNotFound';
				unset($url[0]);
			// }
		}
		// echo $this->fileExists('app/controllers/' . $this->controller . '.php');

		require_once $this->fileExists('app/controllers/' . $this->controller . '.php');
		$this->controller = new $this->controller;

		if (isset($url[1])) {
			// Replace - with _ in url
			$url[1] = str_replace('-', '_', $url[1]);
			// If method exist, call method
			if (method_exists($this->controller, $url[1])) {
				/* Define method name */
				define('M_NAME', $url[1]);
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		if (!empty($url)) {
			$this->params = array_values($url);
		}
		
		// $this->main();

		

		//jalankan controller
		call_user_func_array(array($this->controller, $this->method), $this->params);
	}

	public function parseURL(){
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = explode('/',$url);
			return $url;
		}
	}

	function fileExists($fileName, $caseSensitive = false) {

		if(file_exists($fileName)) {
			return $fileName;
		}
		if($caseSensitive) return false;
	
		// Handle case insensitive requests            
		$directoryName = dirname($fileName);
		$fileArray = glob($directoryName . '/*', GLOB_NOSORT);
		$fileNameLowerCase = strtolower($fileName);
		foreach($fileArray as $file) {
			if(strtolower($file) == $fileNameLowerCase) {
				return $file;
			}
		}
		return false;
	}

	// public function main(){
	// 	include "app/controllers/Main.php";
	// 	$GLOBALS['Main'] = new Main;
	// 	$GLOBALS['Main']-> getModifyMenu();
	// }

	// function getMenuByLink(){
	// 	$C_NAME = C_NAME;
	// 	$db 	= new Database;
	// 	$Q 		= "
	// 		SELECT
	// 				NmMenu 
	// 			,	LinkMenu
	// 		FROM _CRM_Menu
	// 		WHERE LinkMenu = '$C_NAME'
    //     ";
	// 	$db->prepare($Q);
	// 	$db->execute();
	// 	$result = $db->fetch();

	// 	$menu['list_menu'][] = array(
	// 			'NmMenu' 	=> '<i class="fa fa-chart-line"></i> Dashboard'
	// 		,	'LinkMenu' 	=> 'dashboard'
	// 	);
	// 	$menu['nama_menu'] = 'Dashboard';

	// 	if ($result) {
	// 		$NmMenu 	= trim($result['NmMenu']);
	// 		$LinkMenu 	= trim($result['LinkMenu']);

	// 		$menu['list_menu'][] = array(
	// 				'NmMenu' 	=> $NmMenu
	// 			,	'LinkMenu' 	=> $LinkMenu
	// 		);
	// 		$menu['nama_menu'] = $NmMenu;
	// 	}

	// 	return $menu;
	// }

}