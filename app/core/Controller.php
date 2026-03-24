<?php

class Controller {
	// public function view($view = '', $data = array()) {
	// 	if (!file_exists('app/views/' . $view . '.php')) return false;
	// 	require_once 'app/views/' . $view . '.php';
	// }

	public function view($view = 'index', $data = array()) {
		if (file_exists('app/views/' . $view . '.php')){
			require_once 'app/views/' . $view . '.php';
		}else{
			$view = strtolower($view);
			if (file_exists('app/views/' . $view . '.php')){
				require_once 'app/views/' . $view . '.php';
			}else{
				return false;
			}
		}
	}

	public function model($model) {
		require_once 'app/models/' . $model . '.php';
		return new $model;
	}
}