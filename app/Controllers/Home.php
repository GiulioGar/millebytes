<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once './vendor/autoload.php';

require './vendor/phpmailer/src/Exception.php';
require './vendor/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/src/SMTP.php';

class Home extends BaseController {
	
	public function index() {

		helper('url');

		$request = \Config\Services::request();

		$session = session();
        $data['nameuser'] = $session->get('user_name');
		$data['pointsuser'] = intval($session->get('user_points'));
		$data['iduser'] = $session->get('user_id');
		$data['nSurvey'] = $session->get('nSurvey');

		if(url_is('home/msg/register')) {
			$data['msg'] = 'Operazione eseguita con successo<br>Controlla la tua email per attivarti';
		}

		return view('home',$data);
	}

	
	public function contact() {
		helper(['form', 'url']);

		$session = session();
        $data['nameuser'] = $session->get('user_name');
		$data['pointsuser'] = intval($session->get('user_points'));
		$data['iduser'] = $session->get('user_id');
		$data['nSurvey'] = $session->get('nSurvey');

		$db      = \Config\Database::connect();
		$data['query'] = $db->query("SELECT * FROM settings WHERE area='contact_form'");

		$data['oCart'] = intval($session->get('oCart'));

		return view('contact', $data);
	}


	public function contactSend() {

		helper('functions','form');

		$db      = \Config\Database::connect();
		$data['db']      = \Config\Database::connect();
		$request = \Config\Services::request();
		$email = \Config\Services::email();


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
			$mail->setFrom('noreply@interactive-mr.com', 'Millebytes');
			$mail->addAddress('millebytes@interactive-mr.com');

			//Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'MilleBytes - Contatto dal sito - '.$this->request->getVar('info');
			$mail->Body    = "<html><body style='font-family:Verdana;font-size:10pt;'><img src='http://millebytes.com/sites/default/files/milebytes-logo.jpg' height='50'>
			<br><br>".$this->request->getVar('name')."<br>Telefono: ".$this->request->getVar('phone_number')."<br>Email: ".$this->request->getVar('email')."<br> scrive ".$this->request->getVar('message')."<br><br>Non rispondere a questa e-mail. Mail generata automaticamente dal sistema.<br><br><hr><br>MilleBytes</body></html></body></html>";
			$mail->AltBody = '';

			$mail->send();

			echo "Messaggio inviato correttamente!";

		} catch (Exception $e) {
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			$data['mailError'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
		}

		//return view('contact_confirm',$data);
	}


	public function cart() {

		helper('functions');

		$db      = \Config\Database::connect();
		$data['db']      = \Config\Database::connect();
		$email = \Config\Services::email();

		$session = session();

		if(!$session->get('user_id')) {
			return redirect()->route("/");
		}

		if(strpos($_SERVER['HTTP_REFERER'], "/cart/confirm/")) {
			return redirect()->to("/mydashboard");
		}

		//se è richiesta di conferma premio e il sid è un numero
		if( $this->request->uri->getSegment(2)=='confirm' && intval($this->request->uri->getSegment(3))>0 ) {

			//sid = tipo di premio richiesto
			$sid = intval($this->request->uri->getSegment(3));

			//prendo le informazioni del tipo di premio
			$qSEnv = $db->query("SELECT * FROM premi WHERE id=".$sid);
			$rSEnv = $qSEnv->getRow();

			//prendo le informazioni utente
			$data['qUser'] = $db->query("SELECT * FROM t_user_info WHERE email='".$session->get('email')."' AND user_id='".$session->get('user_id')."' LIMIT 1");
			$rUser = $data['qUser']->getRow();

			//controllo se utente ha i punti necessari per richiedere il premio
			if($rUser->points>=$rSEnv->punti) {

				$points = $rUser->points - $rSEnv->punti;
					
				$builder = $db->table('t_user_info');
				$builder->set('points', $points);
				$builder->where('user_id', $rUser->user_id);
				$builder->update();
	
				$builder2 = $db->table('t_user_history');
				$dataQ = [
					'user_id' => $rUser->user_id,
					'event_date' => date('Y-m-d H:i:s'),
					'event_type' => 'withdraw',
					'event_info' => $rSEnv->nome.' '.$rSEnv->valore.' euro',
					'prev_level' => $rUser->points,
					'new_level' => $points,
					'ip' => $_SERVER['REMOTE_ADDR']
				];
				$builder2->insert($dataQ);
				//echo $db->getLastQuery(); exit;

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
					$mail->setFrom('prizes@interactive-mr.com', 'Premi Club Millebytes');
					$mail->addAddress('millebytes@interactive-mr.com');
					$mail->addAddress($rUser->email);
	
					//Content
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = 'MilleBytes - Hai richiesto un Premio';
					$mail->Body    = "<html><body style='font-family:Verdana;font-size:10pt;'><img src='http://millebytes.com/sites/default/files/milebytes-logo.jpg' height='50'><br><br>
					Caro ".$session->get('user_name').",<br>
					Hai inviato una richiesta Premio dal sito del Club Millebytes, di seguito i dettagli della richiesta:<br><br>
					Premio richiesto: ".$rSEnv->nome."<br>
					Punti spesi : ".$rSEnv->punti."<br>
					Punti attuali: ".$points."<br><br>
					La tua richiesta sarà presa in carico dal nostro personale addetto e sarà evasa massimo entro 30 giorni.<br><br>
					Saluti,<br>
					Il Team Club Millebytes
					<br><br>Non rispondere a questa e-mail. Mail generata automaticamente dal sistema.<br><br><hr><br></body></html></body></html>";
					$mail->AltBody = '';
	
					$mail->send();
	
				} catch (Exception $e) {
					echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				}
	
				$session->set('user_points', $points);
				$data['pointsuser'] = intval($points);

				$data['msg'] = 'Richiesta premio inviata correttamente';

			} 

		}

		
		$qUser = $db->query("SELECT * FROM t_user_info WHERE email='".$session->get('email')."' AND user_id='".$session->get('user_id')."' LIMIT 1");
		$rUser = $qUser->getRow();
		
		$data['nameuser'] = $session->get('user_name');
		$data['pointsuser'] = intval($rUser->points);
		$data['iduser'] = $session->get('user_id');
		$data['nSurvey'] = $session->get('nSurvey');

		//echo $data['pointsuser'] ;
		//exit;

		$today = date("Y-m-d H:i:s");
		$today2 = date("Y-m-d");
		$thour = date("H:i:s");

		
		$data['qUser'] = $db->query("SELECT * FROM t_user_info WHERE email='".$session->get('email')."' AND user_id='".$session->get('user_id')."' LIMIT 1");
		//$data['qCart'] = $db->query("SELECT * FROM t_user_history WHERE event_type='withdraw' ORDER BY prev_level DESC LIMIT 5");
		$data['qCart'] = $db->query("SELECT * FROM premi WHERE status=1 ORDER BY id ASC, valore");

		/*
		$data['qWithdraw'] = $db->query("
		SELECT * 
		FROM t_user_history 
		WHERE event_type = 'withdraw' AND event_info!=' euro' AND user_id='".$session->get('user_id')."' AND pagato=0");
		*/
		
		$data['qWithdraw'] = $db->query("
		SELECT t_user_history.*, DATEDIFF('".$today."', event_date) AS days, DAY(TIMEDIFF('".$today."', event_date)) AS daysd, HOUR(TIMEDIFF('".$today."', event_date)) AS hourd , MINUTE(TIMEDIFF('".$today."', event_date)) AS mind, TIMEDIFF('".$today."', event_date) AS td 
		FROM t_user_history 
		WHERE event_type = 'withdraw' AND event_info!=' euro' AND user_id='".$session->get('user_id')."' AND pagato=0
		HAVING days<=60
		ORDER BY event_date DESC");

		$data['qWithdrawPay'] = $db->query("
		SELECT t_user_history.*, DATEDIFF('".$today."', event_date) AS days, DAY(TIMEDIFF('".$today."', event_date)) AS daysd, HOUR(TIMEDIFF('".$today."', event_date)) AS hourd , MINUTE(TIMEDIFF('".$today."', event_date)) AS mind, TIMEDIFF('".$today."', event_date) AS td 
		FROM t_user_history 
		WHERE event_type = 'withdraw' AND event_info!=' euro' AND user_id='".$session->get('user_id')."' AND pagato=0
		");


		$data['qCart0'] = $db->query("
		SELECT t_user_history.*, DATEDIFF('".$today2."', event_date) AS days 
		FROM t_user_history 
		WHERE event_type = 'withdraw' AND event_info!=' euro' AND user_id='".$session->get('user_id')."' AND pagato=0
		HAVING days<=60
		ORDER BY event_date DESC");
		$oCart = $data['qCart0']->getNumRows();

		$session->set('oCart', $oCart);

		$data['oCart'] = intval($session->get('oCart'));

		return view('cart', $data);
	}


	public function confirmPrize() {

		$session = session();
		$data['nameuser'] = $session->get('user_name');
		$data['pointsuser'] = intval($session->get('user_points'));
		$data['iduser'] = $session->get('user_id');
		$data['nSurvey'] = $session->get('nSurvey');

		$sid = $this->request->uri->getSegment(2);

		$db      = \Config\Database::connect();
		$data['db']      = \Config\Database::connect();
		$email = \Config\Services::email();
		
		//$qSEnv = $db->query("SELECT * FROM t_surveys_env WHERE sid='".$sid."' AND name='prize.prim.complete'");
		$qSEnv = $db->query("SELECT * FROM premi WHERE id=".$sid);
		$rSEnv = $qSEnv->getRow();

		$data['qUser'] = $db->query("SELECT * FROM t_user_info WHERE email='".$session->get('email')."' LIMIT 1");
		$rUser = $data['qUser']->getRow();
		//echo $rSEnv->punti;exit;

		//se ci sono i punti necessari per procedere
		if($rUser->points>=$rSEnv->punti) {

			$points = $rUser->points - $rSEnv->punti;

			//$qCart = $db->query("SELECT * FROM t_user_history WHERE event_type='withdraw' ORDER BY RAND() DESC LIMIT 1");
			//$rCart = $qCart->getRow();

			//echo $rSEnv->value.$session->get('email');exit;
			
			$builder = $db->table('t_user_info');
			$builder->set('points', $points);
			$builder->where('user_id', $data['iduser']);
			$builder->update();
			//exit;

			$builder2 = $db->table('t_user_history');
			$dataQ = [
				'user_id' => $data['iduser'],
				'event_date' => date('Y-m-d H:i:s'),
				'event_type' => 'withdraw',
				'event_info' => $rSEnv->nome.' '.$rSEnv->valore.' euro',
				'prev_level' => $rUser->points,
				'new_level' => $points
			];
			//print_r($dataQ);exit;
			$builder2->insert($dataQ);

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
				$mail->setFrom('prizes@interactive-mr.com', 'Premi Club Millebytes');
				$mail->addAddress('millebytes@interactive-mr.com');
				$mail->addAddress($rUser->email);

				//Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'MilleBytes - Hai richiesto un Premio';
				$mail->Body    = "<html><body style='font-family:Verdana;font-size:10pt;'><img src='http://millebytes.com/sites/default/files/milebytes-logo.jpg' height='50'><br><br>
				Caro ".$session->get('user_name').",<br>
				Hai inviato una richiesta Premio dal sito del Club Millebytes, di seguito i dettagli della richiesta:<br><br>
				Premio richiesto: ".$rSEnv->nome."<br>
				Punti spesi : ".$rSEnv->punti."<br>
				Punti attuali: ".$points."<br><br>
				La tua richiesta sarà presa in carico dal nostro personale addetto e sarà evasa massimo entro 30 giorni.<br><br>
				Saluti,<br>
				Il Team Club Millebytes
				<br><br>Non rispondere a questa e-mail. Mail generata automaticamente dal sistema.<br><br><hr><br></body></html></body></html>";
				$mail->AltBody = '';

				$mail->send();

			} catch (Exception $e) {
				echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}

			$session->set('user_points', $points);
			$data['pointsuser'] = intval($points);

			return view('prize_confirm', $data);
		
		} else {
			return redirect()->route("cart");
		}

		
	}


	public function registrationConfirm() {

		helper('functions','form');

		$db      = \Config\Database::connect();
		$data['db']      = \Config\Database::connect();
		$request = \Config\Services::request();
		$email = \Config\Services::email();

		if($this->request->uri->getSegment(2)=='error') {
			//echo $this->request->uri->getSegment(2); exit;
			$data['error'] = 'Email già presente nel sistema';
			return view('registration_confirm', $data);
		}

		$qUser = $db->query("SELECT * FROM t_user_info WHERE email='".$request->getVar('email')."'");
		$nUser = $qUser->getNumRows();

		if($nUser>0) {

			//return view('registration_confirm/?error=email', $data);
			return redirect()->to('/registration_confirm/error'); 

		} else {

			$session = session();
			$data['nameuser'] = $session->get('user_name');
			$data['pointsuser'] = intval($session->get('user_points'));
			$data['iduser'] = $session->get('user_id');
			$data['nSurvey'] = $session->get('nSurvey');

			$uid = generateUID();
		
			$builder = $db->table('t_user_info');
			$data = [
				'user_id' => $uid,
				'second_name' => $request->getVar('second_name'),
				'first_name' => $request->getVar('first_name'),
				'gender' => $request->getVar('gender'),
				'birth_date' => $request->getVar('birth_date'),
				'province_id' => $request->getVar('province_id'),
				'email' => $request->getVar('email'),
				'pwd' => md5($request->getVar('pwd')),
				'country' => $request->getVar('country'),
				'reg_date' => date('Y-m-d H:i:s'),
				'provenienza' => $request->getVar('provenienza'),
				'confirm' => 0,
				'active' => 0
			];
			$builder->insert($data);


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
				$mail->addAddress($request->getVar('email'));
				//$mail->addBCC('it.paolo.russo@gmail.com');

				//Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'MilleBytes - Benvenuto, ecco alcune informazioni!';
				$mail->Body    = "<html><body style='font-family:Verdana;font-size:10pt;'><img src='http://millebytes.com/sites/default/files/milebytes-logo.jpg' height='50'><br><br>
				Benvenuto nel Club Millebytes!<br><br>
				Puoi accedere ora alla tua area riservata cliccando questo link o copiandolo ed incollandolo nel tuo
				browser:<br>
				<a href='".base_url()."/userActive/".$uid."?sid=".$request->getVar('sid')."'>link</a><br>
				Questo link può essere usato una sola volta per effettuare il login e ti condurrà ad una pagina in cui potrai
				impostare la tua password.<br>
				Una volta impostata la tua password, sarai in grado di eseguire il login su http://millebytes.com/it/user in
				futuro utilizzando:<br><br>
				nome utente: la tua email<br>
				password: la password che hai scelto<br><br>
				il team Club Millebytes
				<br><br>Non rispondere a questa e-mail. Mail generata automaticamente dal sistema.<br><br><hr><br></body></html></body></html>";
				$mail->AltBody = '';

				$mail->send();

			} catch (Exception $e) {
				echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}

			$data['msg'] = "Operazione eseguita con successo! Controlla la tua email per attivare il tuo account.";
			/*GIUSEPPE*/
			$data['sid'] = $request->getVar('sid');
			/* */
			//return view('registration_confirm', $data);
			return view('home',$data);

		}
	}

	
	public function registrationActive() {

		helper('functions');

		$db      = \Config\Database::connect();
		$data['db']      = \Config\Database::connect();
		$request = \Config\Services::request();

		$uid = $this->request->uri->getSegment(2);

		$qUser = $db->query("SELECT * FROM t_user_info WHERE user_id='".$uid."'");
		$nUser = $qUser->getNumRows();

		if($nUser==0) {

			//return view('registration_confirm/?error=email', $data);
			return redirect()->to(base_url().'/registration_confirm/error'); 

		} else {
		
			$builder = $db->table('t_user_info');
			$data = [
				'confirm' => 1,
				'active' => 1
			];
			$builder->where('user_id',$uid);
			$builder->update($data);

			return view('registration_active', $data);

		}
	}

	public function regolamento() {
		$session = session();
        $data['nameuser'] = $session->get('user_name');
		$data['pointsuser'] = intval($session->get('user_points'));
		$data['iduser'] = $session->get('user_id');
		$data['nSurvey'] = $session->get('nSurvey');
		$data['oCart'] = intval($session->get('oCart'));
		return view('regolamento', $data);
	}


	public function privacy() {
		$session = session();
        $data['nameuser'] = $session->get('user_name');
		$data['pointsuser'] = intval($session->get('user_points'));
		$data['iduser'] = $session->get('user_id');
		$data['nSurvey'] = $session->get('nSurvey');
		$data['oCart'] = intval($session->get('oCart'));
		return view('privacy', $data);
	}

	public function faq() {

		$session = session();
        $data['nameuser'] = $session->get('user_name');
		$data['pointsuser'] = intval($session->get('user_points'));
		$data['iduser'] = $session->get('user_id');
		$data['nSurvey'] = $session->get('nSurvey');
		$data['oCart'] = intval($session->get('oCart'));

		$db      = \Config\Database::connect();
		$builder = $db->table('faq');
		$data['qList'] = $builder->get();

		return view('faq', $data);
	}


	public function logout() {

	}
}
