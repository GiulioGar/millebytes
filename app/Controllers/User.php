<?php

namespace App\Controllers;
use App\Models\UserModel;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once './vendor/autoload.php';

require './vendor/phpmailer/src/Exception.php';
require './vendor/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/src/SMTP.php';

class User extends BaseController {
	
	public function index(){
		helper(['form', 'url']);
		return view('login');
	}


	public function login(){

		$session = session();

		if($session->get('user_id')) {
			return redirect()->route("/");
		}

		helper(['form', 'url']);
		return view('login');
	}

	public function lost(){
		helper(['form', 'url']);
		return view('lost');
	}


	public function auth() {

        $session = session();

        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('psw');
        $data = $model->where('email', $email)->first();

        if($data){
            $pass = $data['pwd'];
			$active = $data['active'];
			$confirm = $data['confirm'];
            if(md5($password)==$pass && $confirm==1){
                $ses_data = [
                    'user_id'       => $data['user_id'],
                    'user_name'     => $data['first_name'],
                    'user_email'    => $data['email'],
					'user_points'    => $data['points'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
				$session->set('email', $data['email']);
                return redirect()->to('/mydashboard');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
				$datal['msg'] = 'Password errata';
                return view('/login',$datal);
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            $datal['msg'] = 'Email non registrata nel sistema o non attiva';
            return view('/login',$datal);
        }
    }


	public function lostform() {

		helper(['form', 'url', 'functions']);

		$db      = \Config\Database::connect();
		$data['db']      = \Config\Database::connect();
		$request = \Config\Services::request();
		$email = \Config\Services::email();

		$emailUser = $this->request->getVar('email');

		$qUser = $db->query("SELECT * FROM t_user_info WHERE email='".$emailUser."'");
		//$row = $qUser->getRow($emailUser);
		$row = $qUser->getRow();

		$newPsw = generateNewPsw($emailUser);

		$builder = $db->table('t_user_info');
		$builder->set('pwd', md5($newPsw));
		$builder->where('user_id', $row->user_id);
		$builder->update();
		//echo $db->getLastQuery()->getQuery();exit;

		$mail = new PHPMailer(true); 

		try {
			//Server settings
			$mail->SMTPDebug = 0;                                 // Enable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  
			$mail->Port = 587;                                    // TCP port to connect to
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'millebytes@interactive-mr.com';                 // SMTP username
			$mail->Password = 'Vesuvio2!'; 
			$mail->SMTPSecure = 'tsl';  

			//Recipients
			$mail->setFrom('noreply@interactive-mr.com', 'Club MilleBytes');
			$mail->addAddress($emailUser);

			//Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'MilleBytes - La tua password';
			$mail->Body    = "<html><body style='font-family:Verdana;font-size:10pt;'><img src='http://millebytes.com/sites/default/files/milebytes-logo.jpg' height='50'><br><br>
			Come da tua richiesta abbiamo resettato la password e assegnata una nuova: ".$newPsw."<br><br>
			il team Club Millebytes
			<br><br>Non rispondere a questa e-mail. Mail generata automaticamente dal sistema.<br><br><hr><br></body></html></body></html>";
			$mail->AltBody = '';

			$mail->send();

		} catch (Exception $e) {
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}

		$datal['msg'] = 'Ti abbiamo inviato una email con la tua nuova password';
		return view('login',$datal);

	}


	public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }


	public function registrazione(){

		$session = session();

		$request = \Config\Services::request();

		if($session->get('user_id')) {
			return redirect()->route("/");
		}

		$data['prov'] = 'website';

		if($this->request->uri->getSegment(2)=='pro') {
			$data['prov'] = $this->request->uri->getSegment(3);
		}
		
		helper(['form', 'url']);
		return view('registrazione',$data);
	}


	public function storico(){

		helper('functions');

		$session = session();
		$data['nameuser'] = $session->get('user_name');
		$data['pointsuser'] = intval($session->get('user_points'));
		$data['iduser'] = $session->get('user_id');
		$data['nSurvey'] = $session->get('nSurvey');

		if(!$session->get('user_id')) {
			return redirect()->route("/");
		}

		$db      = \Config\Database::connect();
		$data['qUser'] = $db->query("
		SELECT * 
		FROM t_user_history 
		WHERE user_id='".$session->get('user_id')."' AND (event_type='withdraw' OR event_type='interview_complete') AND event_info!=' euro'
		ORDER BY event_date DESC, event_type, prev_level DESC");

		$data['oCart'] = intval($session->get('oCart'));

		return view('storico',$data);
	}


	public function profilo() {

		$session = session();
		$data['nameuser'] = $session->get('user_name');
		$data['pointsuser'] = intval($session->get('user_points'));
		$data['iduser'] = $session->get('user_id');
		$data['nSurvey'] = $session->get('nSurvey');
		//$data['uid'] = $this->request->uri->getSegment(3);

		if(!$session->get('user_id')) {
			return redirect()->route("/");
		}

		helper(['form','functions']);

		$db      = \Config\Database::connect();
		$data['db']      = \Config\Database::connect();
		$request = \Config\Services::request();

		if( $this->request->uri->getSegment(2)=='close' && $request->getVar('act')=='close' && $request->getVar('confirm')==1 ) {
			$builder = $db->table('t_user_info');
			$data = [
				'confirm' => 0,
				'active' => 0
			];
			$builder->where('user_id',$session->get('user_id'));
			$builder->update($data);

			$session->destroy();
			return redirect()->to('/');
		}

		$data['qUser'] = $db->query("
		SELECT t_user_info.*
		FROM t_user_info 
		WHERE email='".$session->get('email')."' 
		LIMIT 1");

		$data['oCart'] = intval($session->get('oCart'));

		return view('profile',$data);
	}


	public function profiloEdit() {

		$session = session();
		$data['nameuser'] = $session->get('user_name');
		$data['pointsuser'] = intval($session->get('user_points'));
		$data['iduser'] = $session->get('user_id');
		$data['nSurvey'] = $session->get('nSurvey');
		$data['uid'] = $this->request->uri->getSegment(3);

		if(!$session->get('user_id')) {
			return redirect()->route("/");
		}

		helper(['form','url','functions']);

		
		$db      = \Config\Database::connect();
		$data['db']      = \Config\Database::connect();
		$request = \Config\Services::request();
		$email = \Config\Services::email();


		/*
		$builder = $db->table('t_user_info');
		$data = [
			'second_name' => $request->getVar('second_name'),
			'first_name' => $request->getVar('first_name'),
			'gender' => $request->getVar('gender'),
			'birth_date' => $request->getVar('birth_date'),
			'work_id' => $request->getVar('work_id'),
			'instr_level_id' => $request->getVar('instr_level_id'),
			'address' => $request->getVar('address'),
			'code' => $request->getVar('code'),
			'city' => $request->getVar('city'),
			'province_id' => $request->getVar('province_id'),
			'mobile_phone' => $request->getVar('mobile_phone'),
			'mar_status_id' => $request->getVar('mar_status_id'),
			'country' => $request->getVar('country')
		];

		if($request->getVar('pwd')) {

			$data['pwd'] = $request->getVar('pwd');

			$mail = new PHPMailer(true); 

			try {
				//Server settings
				$mail->SMTPDebug = 0;                                 // Enable verbose debug output
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtps.aruba.it';  
				$mail->Port = 465;                                    // TCP port to connect to
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'postmaster@engine-lab.it';                 // SMTP username
				$mail->Password = 'Paoire1982'; 
				$mail->SMTPSecure = 'ssl';  

				//Recipients
				$mail->setFrom('noreply@interactive-mr.com', 'Club MilleBytes');
				$mail->addAddress('millebytes@interactive-mr.com');
				$mail->addBCC('it.paolo.russo@gmail.com');

				//Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'MilleBytes - La tua password è stata modificata';
				$mail->Body    = "<html><body style='font-family:Verdana;font-size:10pt;'><img src='http://millebytes.com/sites/default/files/milebytes-logo.jpg' height='50'><br><br>
				La tua password è stata modificata correttamente!<br><br>
				il team Club Millebytes
				<br><br>Non rispondere a questa e-mail. Mail generata automaticamente dal sistema.<br><br><hr><br></body></html></body></html>";
				$mail->AltBody = '';

				$mail->send();

			} catch (Exception $e) {
				echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}
		}
		$builder->where('user_id',$this->request->uri->getSegment(3));
		$builder->update($data);
		*/

		if($request->getVar('act')=='update') {

			$uid = $request->getVar('uid');

			$builder = $db->table('t_user_info');
			$data0 = [
				'second_name' => $request->getVar('second_name'),
				'first_name' => $request->getVar('first_name'),
				'gender' => $request->getVar('gender'),
				'birth_date' => $request->getVar('birth_date'),
				'work_id' => $request->getVar('work_id'),
				'instr_level_id' => $request->getVar('instr_level_id'),
				'address' => $request->getVar('address'),
				'code' => $request->getVar('code'),
				'city' => $request->getVar('city'),
				'province_id' => $request->getVar('province_id'),
				'mobile_phone' => $request->getVar('mobile_phone'),
				'mar_status_id' => $request->getVar('mar_status_id'),
				'country' => $request->getVar('country')
			];

			$validated = $this->validate([
				'file' => [
					'uploaded[image]',
					'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
					'max_size[image,4096]',
				],
			]);

			if ($validated) {
				$newName = 'profile_'.$session->get("user_id").'.jpg';
				$avatar = $this->request->getFile('image');
				$avatar->move('uploads/user',$newName,true);

				$data0['image'] = $newName;

			}

			if($request->getVar('pwd')) {

				$data0['pwd'] = md5($request->getVar('pwd'));

				$mail = new PHPMailer(true); 

				try {
					//Server settings
					$mail->SMTPDebug = 0;                                 // Enable verbose debug output
					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';  
					$mail->Port = 587;                                    // TCP port to connect to
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'millebytes@interactive-mr.com';                 // SMTP username
					$mail->Password = 'Vesuvio2!'; 
					$mail->SMTPSecure = 'tsl';  

					//Recipients
					$mail->setFrom('noreply@interactive-mr.com', 'Club MilleBytes');
					$mail->addAddress('millebytes@interactive-mr.com');

					//Content
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = 'MilleBytes - La tua password &egrave; stata modificata';
					$mail->Body    = "<html><body style='font-family:Verdana;font-size:10pt;'><img src='http://millebytes.com/sites/default/files/milebytes-logo.jpg' height='50'><br><br>
					La tua password è stata modificata correttamente!<br><br>
					il team Club Millebytes
					<br><br>Non rispondere a questa e-mail. Mail generata automaticamente dal sistema.<br><br><hr><br></body></html></body></html>";
					$mail->AltBody = '';

					$mail->send();

				} catch (Exception $e) {
					echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				}
			}
			$builder->where('user_id',$uid);
			$builder->update($data0);

			$data['nameuser'] = $session->get('user_name');
			$data['msg'] = 'Dati profilo aggiornati correttamente';
		}

		$data['qUser'] = $db->query("SELECT * FROM t_user_info WHERE user_id='".$this->request->uri->getSegment(3)."' LIMIT 1");
		$data['uid'] = $this->request->uri->getSegment(3);

		$data['oCart'] = intval($session->get('oCart'));

		return view('profile_edit',$data);
	}


	public function profiloUpdate() {

		$session = session();
		$data['nameuser'] = $session->get('user_name');
		$data['pointsuser'] = intval($session->get('user_points'));
		$data['iduser'] = $session->get('user_id');
		$data['nSurvey'] = $session->get('nSurvey');

		helper(['form','functions']);
		
		$db      = \Config\Database::connect();
		$data['db']      = \Config\Database::connect();
		$request = \Config\Services::request();
		$email = \Config\Services::email();

		$uid = $request->getVar('uid');

		$builder = $db->table('t_user_info');
		$data = [
			'second_name' => $request->getVar('second_name'),
			'first_name' => $request->getVar('first_name'),
			'gender' => $request->getVar('gender'),
			'birth_date' => $request->getVar('birth_date'),
			'work_id' => $request->getVar('work_id'),
			'instr_level_id' => $request->getVar('instr_level_id'),
			'address' => $request->getVar('address'),
			'code' => $request->getVar('code'),
			'city' => $request->getVar('city'),
			'province_id' => $request->getVar('province_id'),
			'mobile_phone' => $request->getVar('mobile_phone'),
			'mar_status_id' => $request->getVar('mar_status_id'),
			'country' => $request->getVar('country')
		];

		if($request->getVar('pwd')) {

			$data['pwd'] = md5($request->getVar('pwd'));

			$mail = new PHPMailer(true); 

			try {
				//Server settings
				$mail->SMTPDebug = 0;                                 // Enable verbose debug output
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  
				$mail->Port = 587;                                    // TCP port to connect to
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'millebytes@interactive-mr.com';                 // SMTP username
				$mail->Password = 'Vesuvio2!'; 
				$mail->SMTPSecure = 'tsl';   

				//Recipients
				$mail->setFrom('noreply@interactive-mr.com', 'Club MilleBytes');
				$mail->addAddress('millebytes@interactive-mr.com');

				//Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'MilleBytes - La tua password &egrave; stata modificata';
				$mail->Body    = "<html><body style='font-family:Verdana;font-size:10pt;'><img src='http://millebytes.com/sites/default/files/milebytes-logo.jpg' height='50'><br><br>
				La tua password è stata modificata correttamente!<br><br>
				il team Club Millebytes
				<br><br>Non rispondere a questa e-mail. Mail generata automaticamente dal sistema.<br><br><hr><br></body></html></body></html>";
				$mail->AltBody = '';

				$mail->send();

			} catch (Exception $e) {
				echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}
		}
		$builder->where('user_id',$uid);
		$builder->update($data);


		//$data['qUser'] = $db->query("SELECT * FROM t_user_info WHERE user_id='".$this->request->uri->getSegment(3)."' LIMIT 1");

		$data['qUser'] = $db->query("
		SELECT t_user_info.*, works.name AS professione
		FROM t_user_info 
		LEFT JOIN works ON works.id = t_user_info.work_id
		WHERE user_id='".$uid."' 
		LIMIT 1");
		return redirect()->route("profilo");
		//return view('profile',$data);
		//return view('profile_edit',$data);
	}


	public function cart() {

		$session = session();
		$data['nameuser'] = $session->get('user_name');
		$data['pointsuser'] = intval($session->get('user_points'));
		$data['iduser'] = $session->get('user_id');
		$data['nSurvey'] = $session->get('nSurvey');

		if(!$session->get('user_id')) {
			return redirect()->route("/");
		}

		$db      = \Config\Database::connect();
		$data['qUser'] = $db->query("SELECT * FROM t_user_info WHERE email='".$session->get('email')."' LIMIT 1");
		$data['qCart'] = $db->query("SELECT * FROM t_user_history WHERE user_id='".$session->get('user_id')."' AND event_type='withdraw' ORDER BY prev_level DESC");

		$data['oCart'] = intval($session->get('oCart'));

		return view('cart',$data);
	}


	public function dashboard() {

		helper('functions');

		$session = session();
        $data['nameuser'] = $session->get('user_name');
		$data['pointsuser'] = intval($session->get('user_points'));
		$data['iduser'] = $session->get('user_id');

		if(!$session->get('user_id')) {
			return redirect()->route("/");
		}

		$today = date("Y-m-d H:i:s");
		$today2 = date("Y-m-d");
		$thour = date("H:i:s");

		$db      = \Config\Database::connect();
		$data['db']      = \Config\Database::connect();

		$data['qUser'] = $db->query("SELECT * FROM t_user_info WHERE email='".$session->get('email')."' LIMIT 1");
		$qUser = $data['qUser']->getRow();
		//$data['qList'] = $db->query("SELECT * FROM t_surveys LIMIT 3");

		//LE TUE ATTIVITA
		$data['qRespint'] = $db->query("SELECT * FROM t_respint WHERE status=0 AND uid='".$session->get('user_id')."'");
		$data['nRespint'] = $data['qRespint']->getNumRows();

		$qSurveys = $db->query("SELECT * FROM t_surveys WHERE status=2 AND sid IN (SELECT sid FROM t_respint WHERE status=0 AND uid='".$session->get('user_id')."')");
        $data['nSurvey'] = $qSurveys->getNumRows();
		//$data['nSurvey'] = $data['qRespint']->getNumRows();
		$session->set('nSurvey', $data['nSurvey']);


		//COUNTDOWN
		$data['qWithdraw'] = $db->query("
		SELECT t_user_history.*, DATEDIFF('".$today."', event_date) AS days, DAY(TIMEDIFF('".$today."', event_date)) AS daysd, HOUR(TIMEDIFF('".$today."', event_date)) AS hourd , MINUTE(TIMEDIFF('".$today."', event_date)) AS mind, TIMEDIFF('".$today."', event_date) AS td 
		FROM t_user_history 
		WHERE event_type = 'withdraw' AND event_info!=' euro' AND user_id='".$session->get('user_id')."' AND pagato=0
		HAVING days<=60
		ORDER BY event_date DESC");


		//I TUOI OBIETTIVI
		//$data['qCart'] = $db->query("SELECT * FROM t_user_history WHERE event_type='withdraw' ORDER BY prev_level DESC LIMIT 3");
		$data['qCart'] = $db->query("SELECT * FROM premi WHERE status=1 ORDER BY punti ASC"); 

		$data['qCart0'] = $db->query("
		SELECT t_user_history.*, DATEDIFF('".$today2."', event_date) AS days 
		FROM t_user_history 
		WHERE event_type = 'withdraw' AND event_info!=' euro' AND user_id='".$session->get('user_id')."' AND pagato=0
		HAVING days<=60
		ORDER BY event_date DESC");
		
		$oCart = 0;
		$vCart = 0;

		/*
		foreach ($data['qCart']->getResult() as $rCart) { 
			$vCart = $vCart + $rCart->punti;
			if($qUser->points>=$vCart) {
				$oCart++;
			}
		}
		*/
		$oCart = $data['qCart0']->getNumRows();

		$session->set('oCart', $oCart);
		$data['oCart'] = $oCart;

		return view('dashboard', $data);
	}
}
