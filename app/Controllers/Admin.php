<?php

namespace App\Controllers;

class Admin extends BaseController {

	public function index(){
		$db      = \Config\Database::connect();
		$data['query'] = $db->query("SELECT * FROM t_user_info ORDER BY reg_date DESC LIMIT 20");
		return view('admin/dashboard', $data);
	}


	public function utentiList(){
		$db      = \Config\Database::connect();
		$data['query'] = $db->query("SELECT * FROM t_user_info ORDER BY second_name ASC LIMIT 20");
		return view('admin/list/user', $data);
	}


	public function utentiNew(){
		$db      = \Config\Database::connect();
		$data['query'] = $db->query("SELECT * FROM t_user_info ORDER BY reg_date DESC LIMIT 20");
		return view('admin/list/user', $data);
	}


	public function sondaggiList(){
		$db      = \Config\Database::connect();
		$data['query'] = $db->query("SELECT * FROM t_user_info ORDER BY reg_date DESC LIMIT 20");
		return view('admin/list/sondaggi', $data);
	}


	public function sondaggiNew(){
		$db      = \Config\Database::connect();
		$data['query'] = $db->query("SELECT * FROM t_user_info ORDER BY reg_date DESC LIMIT 20");
		return view('admin/dashboard', $data);
	}

}
