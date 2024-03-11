<?php

namespace App\Controllers;

class Form extends BaseController {

	public function index(){
		return view('admin/login');
	}


	public function contact(){
		helper(['form', 'url']);

		$email = \Config\Services::email();

		$email->setFrom('noreply@millebytes.com', 'Club MilleBytes');
		$email->setTo('info@millebytes.com');
		//$email->setTo('enginelab@gmail.com');
		$email->setSubject('Contatto dal sito');
		$email->setMessage( $this->request->getVar('message'));

		$email->send();

		return view('contact');
	}



    

}