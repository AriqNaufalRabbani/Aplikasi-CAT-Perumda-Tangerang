<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Func_model {
	private $db;

	public function __construct() {
		$this->db 	 = new Database;
	}

	public function SliceString($String, $Part){
		// $String 	= Kalimat yang ingin di potong
		// $Part 	= Jumlah Kata yang ingin di potong
		$pieces 	= explode(" ", $String);
		$first_part = implode(" ", array_splice($pieces, 0, $Part));

		return $first_part;
	}

	public function AntiInjection($data) {
        $filter = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
        return $filter;
    }

	public function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
		$sort_col = array();
		foreach ($arr as $key => $row) {
			$sort_col[$key] = $row[$col];
		}
	
		array_multisort($sort_col, $dir, $arr);
	}

	public function getRomawi($bln){
		switch ($bln){
				case 1:
					return "I";
					break;
				case 2:
					return "II";
					break;
				case 3:
					return "III";
					break;
				case 4:
					return "IV";
					break;
				case 5:
					return "V";
					break;
				case 6:
					return "VI";
					break;
				case 7:
					return "VII";
					break;
				case 8:
					return "VIII";
					break;
				case 9:
					return "IX";
					break;
				case 10:
					return "X";
					break;
				case 11:
					return "XI";
					break;
				case 12:
					return "XII";
					break;
		}
	}

	function left($str, $length) {
		return substr($str, 0, $length);
	}
		
	function right($str, $length) {
		return substr($str, -$length);
	}
}