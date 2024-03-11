<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once './vendor/autoload.php';

require './vendor/phpmailer/src/Exception.php';
require './vendor/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/src/SMTP.php';

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

class Api extends BaseController {
	
	public function index(){
		helper(['form', 'url']);
		return view('login');
	}


	public function doLogin() {

		$db      = \Config\Database::connect();

		$postData = file_get_contents("php://input");
    
		$list = [];
		$today = date("d/m/Y H:i:s");

		if (isset($postData)) {
			$request = json_decode($postData,true);

			$usr = $postData;
			//print_r($usr);exit;
			$usr = str_replace("[","",$usr);
			$usr = str_replace("]","",$usr);

			$credenziali = explode(",", $usr);

			$email = str_replace('"','',$credenziali[0]);
			$psw = str_replace('"','',$credenziali[1]);
			$token = str_replace('"','',$credenziali[2]);
			$pid = str_replace('"','',$credenziali[3]);


			$qUser = $db->query("SELECT * FROM t_user_info WHERE email = '".$email."' AND pwd='".$psw."' AND confirm=1");
		
			if($nUser = $qUser->getNumRows()>0) {

				$rUser = $qUser->getRow();

				$builder = $db->table('t_user_info');
				$data = [
					'pid' => $pid,
					'token' => $token
				];
				$builder->where('email',$email);
				$builder->update($data);
				
				$list = array(
					'status' => 1,
					'id' => $rUser->user_id,
					'cognome' => $rUser->second_name,
					'nome' => $rUser->first_name,
					'email' => $rUser->email,
					'points' => $rUser->points,
					'pid' => $pid,
					'token' => $token
				);

			} else {

				$list = array(
					'status' => 2,
					'email' => $email,
					'psw' => $psw
				);

			}

			
		} else {

			$list = array(
				'status' => 2,
				'email' => $email,
				'psw' => $psw
			);

		}

		echo json_encode($list);
	}


	public function doRegister() {

		$db      = \Config\Database::connect();
		$email = \Config\Services::email();

		helper('functions');

		$postData = file_get_contents("php://input");
    
		$list = [];
		$today = date("d/m/Y H:i:s");

		if (isset($postData)) {
			$request = json_decode($postData,true);
			//print_r($request);exit;
			$usr = $postData;
			
			$today = date("d/m/Y H:i:s");

			$usr = str_replace("[","",$usr);
			$usr = str_replace("]","",$usr);

			$usr = str_replace("{","",$usr);
			$usr = str_replace("}","",$usr);

			$datiUtente = explode(",", $usr);
			//print_r($datiUtente);exit;

			$nome = str_replace('"','',$datiUtente[1]);
			$cognome = str_replace('"','',$datiUtente[0]);
			$gender = str_replace('"','',$datiUtente[2]);
			$email = str_replace('"','',$datiUtente[3]);
			$provincia = str_replace('"','',$datiUtente[6]);
			$psw = str_replace('"','',$datiUtente[4]);
			$nascita = str_replace('"','',$datiUtente[5]);

			$nome = str_replace('nome:','',$nome);
			$cognome = str_replace('cognome:','',$cognome);
			$email = str_replace('email:','',$email);
			$psw = str_replace('psw:','',$psw);
			$nascita = str_replace('nascita:','',$nascita);
			$gender = str_replace('gender:','',$gender);
			$provincia = str_replace('provincia:','',$provincia);


			$qUser = $db->query("SELECT * FROM t_user_info WHERE email = '".$email."'");
		
			if($nUser = $qUser->getNumRows()>0) {
				$rUser = $qUser->getRow();
				
				$list = array(
					'status' => false,
					'msg' => 'Email già registrata o account non attivo',
					'email' => $email,
					'back' => 1
				);

			} else {

				$uid = generateUID();

				$builder = $db->table('t_user_info');
				$data = [
					'user_id' => $uid,
					'second_name' => $cognome,
					'first_name' => $nome,
					'birth_date' => $nascita,
					'email' => $email,
					'pwd' => $psw,
					'reg_date' => date('Y-m-d H:i:s'),
					'provenienza' => 'app',
					'confirm' => 0,
					'active' => 0
				];
				$builder->insert($data);

				$list = array(
					'status' => true,
					'msg' => 'Registrazione effettuata. Per conferma attivazione del tuo account, controlla la tua casella email',
					'email' => $email,
					'nome' => $nome,
					'cognome' => $cognome,
					'tel' => $tel,
					'back' => 0  
				);

				$mail = new PHPMailer(true); 

				
				try {
					//Server settings
					$mail->SMTPDebug = 0;                                 // Enable verbose debug output
					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';  
					$mail->Port = 587;                                    // TCP port to connect to
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'millebytes@interactive-mr.com';                 // SMTP username
					$mail->Password = 'Vesuvio1!'; 
					$mail->SMTPSecure = 'tsl';  

					//Recipients
					$mail->setFrom('noreply@interactive-mr.com', 'Club MilleBytes');
					$mail->addAddress('millebytes@interactive-mr.com');
					$mail->addAddress($email);
					//$mail->addBCC('it.paolo.russo@gmail.com');

					//Content
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = 'MilleBytes - Benvenuto, ecco alcune informazioni!';
					$mail->Body    = "<html><body style='font-family:Verdana;font-size:10pt;'><img src='http://millebytes.com/sites/default/files/milebytes-logo.jpg' height='50'><br><br>
					Benvenuto nel Club Millebytes!<br><br>
					Puoi accedere ora alla tua area riservata cliccando questo link o copiandolo ed incollandolo nel tuo
					browser:<br>
					<a href='".base_url()."/userActive/".$uid."'>link</a><br>
					Questo link può essere usato una sola volta per effettuare il login e ti condurrà ad una pagina in cui potrai
					impostare la tua password.<br>
					Una volta impostata la tua password, sarai in grado di eseguire il login su https://millebytes.com in
					futuro utilizzando:<br><br>
					nome utente: la tua email<br>
					password: la password che hai scelto<br><br>
					il team Club Millebytes
					<br><br>Non rispondere a questa e-mail. Mail generata automaticamente dal sistema.<br><br><hr><br></body></html></body></html>";
					$mail->AltBody = '';
					
					$mail->send();

					

				} catch (Exception $e) {

					$list = array(
						'status' => false,
						'msg' => 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo,
						'email' => $email
					);
				}
				

			}

		} else {
			$list = array(
				'status' => false,
				'msg' => 'Problema con invio dati al server',
				'email' => $email,
				'back' => 1
			);
		}

		

		echo json_encode($list);
	}

	public function doForgot() {

		$db      = \Config\Database::connect();
		$email = \Config\Services::email();

		helper('functions');

		$email = $_REQUEST['email'];

		$list = [];

		$qUser = $db->query("SELECT * FROM t_user_info WHERE email = '".$email."'");
		if($nUser = $qUser->getNumRows()>0) {

			$rUser = $qUser->getRow();

			$psw = generateNewPsw($email);

			$mail = new PHPMailer(true); 

				try {
					//Server settings
					$mail->SMTPDebug = 0;                                 // Enable verbose debug output
					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';  
					$mail->Port = 587;                                    // TCP port to connect to
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'millebytes@interactive-mr.com';                 // SMTP username
					$mail->Password = 'Vesuvio1!'; 
					$mail->SMTPSecure = 'tsl';  

					//Recipients
					$mail->setFrom('noreply@interactive-mr.com', 'Club MilleBytes');
					$mail->addAddress('millebytes@interactive-mr.com');
					$mail->addAddress($email);
					//$mail->addBCC('it.paolo.russo@gmail.com');

					//Content
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = 'MilleBytes - Reset password';
					$mail->Body    = "<html><body style='font-family:Verdana;font-size:10pt;'><img src='http://millebytes.com/sites/default/files/milebytes-logo.jpg' height='50'><br><br>
					Ciao!<br><br>
					Ecco la tua password per accedere:<br><br>
					nome utente: la tua email<br>
					password: ".$rUser->pwd."<br><br>
					il team Club Millebytes
					<br><br>Non rispondere a questa e-mail. Mail generata automaticamente dal sistema.<br><br><hr><br></body></html></body></html>";
					$mail->AltBody = '';
					
					$mail->send();

					
				} catch (Exception $e) {

					$list = array(
						'status' => false,
						'msg' => 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo,
						'email' => $email
					);
				}
				
					
			$list = array(
				'status' => true,
				'id' => $rUser->user_id,
				'email' => $rUser->email,
				'msg' => 'Abbiamo inviato la tua password alla casella indicata'
			);

		} else {

			$list = array(
				'status' => false,
				'email' => $email,
				'msg' => 'Email non presente nel sistema, si prega di riprovare'
			);

		}

		echo json_encode($list);
	}

	public function doLogout() {
	}

	public function getSurveys() {

		$db      = \Config\Database::connect();

		$list = [
			'nsurveys' => 0,
			'surveys' => []
		];

		$email = $_REQUEST['email'];
		$idu = $_REQUEST['idu'];

		$qUser = $db->query("SELECT * FROM t_user_info WHERE email='".$email."' LIMIT 1");
		$qUser = $qUser->getRow();

		//LE TUE ATTIVITA
		$qRespint = $db->query("SELECT * FROM t_respint WHERE status=0 AND uid='".$idu."'");
		$nRespint = $qRespint->getNumRows();

		if($nRespint>0) {

			$list['nsurveys'] = $nRespint;

			foreach ($qRespint->getResult() as $rRespint) { 

				$qSurveys = $db->query("SELECT * FROM t_surveys WHERE status=2 AND sid='".$rRespint->sid."'");
				$nSurveys = $qSurveys->getNumRows();

				if($nSurveys>0) {

					$rSurveys = $qSurveys->getRow();

					$qSurveysEnv = $db->query("SELECT * FROM t_surveys_env WHERE name='survey_object' AND sid='".$rRespint->sid."'");
					$rSurveysEnv = $qSurveysEnv->getRow();

					$qSurveysEnv2 = $db->query("SELECT * FROM t_surveys_env WHERE name='prize_complete' AND sid='".$rRespint->sid."'");
					$rSurveysEnv2 = $qSurveysEnv2->getRow();

					$qSurveysEnv3 = $db->query("SELECT * FROM t_surveys_env WHERE name='length_of_interview' AND sid='".$rRespint->sid."'");
					$rSurveysEnv3 = $qSurveysEnv3->getRow();

					$list['surveys'][] = array(
						'sid' => $rRespint->sid,
						'prj_name' => $rRespint->prj_name,
						'name' => $rRespint->prj_name,
						'value' => ($rSurveysEnv->value) ? $rSurveysEnv->value : 'nd',
						'bytes' => intval($rSurveysEnv2->value),
						'min' => intval($rSurveysEnv3->value),
						'url' => 'https://www.primisoft.com/primis/run.do?sid='.$rRespint->sid.'&prj='.$rRespint->prj_name
					);
				}
			}
		}

		echo json_encode($list);

	}

	public function getCart() {

		$db      = \Config\Database::connect();

		helper('functions');

		$list = [
			'nsurveys' => 0,
			'ncart' => 0,
			'cart' => [],
			'nocart' => [],
			'requests' => []
		];

		$email = $_REQUEST['email'];
		$idu = $_REQUEST['idu'];

		$today = date("Y-m-d H:i:s");

		$qUser = $db->query("SELECT * FROM t_user_info WHERE email='".$email."' LIMIT 1");
		$qUser = $qUser->getRow();

		//CART
		$qCart = $db->query("SELECT * FROM premi WHERE status=1 AND $qUser->points>=punti ORDER BY id ASC, valore");
		foreach ($qCart->getResult() as $rCart) { 
			$list['cart'][] = array(
				'id' => $rCart->id,
				'nome' => $rCart->nome,
				'valore' => $rCart->valore,
				'punti' => intval($rCart->punti),
				'giorni' => intval($rCart->giorni)
			);
		}

		//NO CART
		$qCart = $db->query("SELECT * FROM premi WHERE status=1 AND $qUser->points<punti ORDER BY id ASC, valore");
		foreach ($qCart->getResult() as $rCart) { 
			$list['nocart'][] = array(
				'id' => $rCart->id,
				'nome' => $rCart->nome,
				'valore' => $rCart->valore,
				'punti' => intval($rCart->punti),
				'giorni' => intval($rCart->giorni)
			);
		}

		//REQUESTS
		$qWithdraw = $db->query("
		SELECT t_user_history.*, DATEDIFF('".$today."', event_date) AS days, DAY(TIMEDIFF('".$today."', event_date)) AS daysd, HOUR(TIMEDIFF('".$today."', event_date)) AS hourd , MINUTE(TIMEDIFF('".$today."', event_date)) AS mind, TIMEDIFF('".$today."', event_date) AS td
		FROM t_user_history 
		WHERE event_type = 'withdraw' AND event_info!=' euro' AND user_id='".$idu."'
		");
		foreach ($qWithdraw->getResult() as $rCart) { 
			$list['requests'][] = array(
				'id' => $rCart->id,
				'event_date' => dateIta($rCart->event_date),
				'event_info' => $rCart->event_info,
				'pagato' => intval($rCart->pagato),
				'codice' => $rCart->codice,
				'prev_level' => intval($rCart->prev_level),
				'daysd' => intval($rCart->daysd),
				'mind' => intval($rCart->mind)
			);
		}

		echo json_encode($list);

	}

	public function doCart() {

		$db      = \Config\Database::connect();
		$email = \Config\Services::email();

		$list = [];

		$idp = $_REQUEST['idp'];
		$idu = $_REQUEST['idu'];

		$qCart = $db->query("SELECT * FROM premi WHERE id=".$idp);
		$rSEnv = $qCart->getRow();

		$qUser = $db->query("SELECT * FROM t_user_info WHERE t_user_info.user_id='".$idu."' LIMIT 1");
		$rUser = $qUser->getRow();
		

		if($rUser->points>=$rSEnv->punti) {

			$points = $rUser->points - $rSEnv->punti;

			$builder = $db->table('t_user_info');
			$builder->set('points', $points);
			$builder->where('user_id', $idu);
			$builder->update();

			$builder2 = $db->table('t_user_history');
			$dataQ = [
				'user_id' => $idu,
				'event_date' => date('Y-m-d H:i:s'),
				'event_type' => 'withdraw',
				'event_info' => $rSEnv->nome.' '.$rSEnv->valore.' euro',
				'prev_level' => $rUser->points,
				'new_level' => $points
			];
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
				$mail->Password = 'Vesuvio1!'; 
				$mail->SMTPSecure = 'tsl'; 

				//Recipients
				$mail->setFrom('prizes@interactive-mr.com', 'Premi Club Millebytes');
				$mail->addAddress('millebytes@interactive-mr.com');
				$mail->addAddress($rUser->email);

				//Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'MilleBytes - Hai richiesto un Premio';
				$mail->Body    = "<html><body style='font-family:Verdana;font-size:10pt;'><img src='http://millebytes.com/sites/default/files/milebytes-logo.jpg' height='50'><br><br>
				Caro ".$rUser->first_name.",<br>
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

				$list = array(
					'status' => true,
					'msg' => 'Abbiamo inviato la tua richiesta di premio, riceverai una email con i dettagli',
					'idu' => $idu,
					'points' => $points,
					'back' => 0  
				);

			} catch (Exception $e) {

				$list = array(
					'status' => false,
					'msg' => 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo,
					'idu' => $idu,
					'points' => $rUser->points,
					'back' => 1  
				);

			}

		} else {
			$list = array(
				'status' => false,
				'msg' => 'Non hai i punti necessari per richiedere il premio',
				'idu' => $idu,
				'points' => $rUser->points,
				'back' => 1  
			);
		}

		echo json_encode($list);

	}

	public function getUserData() {

		$db      = \Config\Database::connect();

		$email = $_REQUEST['email'];
		$idu = $_REQUEST['idu'];

		$list = [];

		$qUser = $db->query("SELECT * FROM t_user_info WHERE email = '".$email."' AND user_id='".$idu."'");
		$rUser = $qUser->getRow();
				
		$list = array(
			'status' => 1,
			'id' => $rUser->user_id,
			'cognome' => $rUser->second_name,
			'nome' => $rUser->first_name,
			'email' => $rUser->email,
			'psw' => $rUser->pwd,
			'nato' => $rUser->birth_date,
			'points' => $rUser->points,
			'pid' => $rUser->pid,
			'token' => $rUser->token
		);

		echo json_encode($list);
	}

	public function deactivateUser() {

		$db      = \Config\Database::connect();

		$email = $_REQUEST['email'];
		$idu = $_REQUEST['idu'];

		$list = [];

		$qUser = $db->query("SELECT * FROM t_user_info WHERE email = '".$email."' AND user_id='".$idu."'");
		$rUser = $qUser->getRow();
				
		$list = array(
			'status' => 1,
			'id' => $rUser->user_id,
			'cognome' => $rUser->second_name,
			'nome' => $rUser->first_name,
			'email' => $rUser->email,
			'psw' => $rUser->pwd,
			'nato' => $rUser->birth_date,
			'points' => $rUser->points,
			'pid' => $rUser->pid,
			'token' => $rUser->token
		);

		$builder = $db->table('t_user_info');
		$data = [
			'status' => 0
		];
		$builder->where('email',$email);
		$builder->where('user_id',$idu);
		$builder->update($data);

		echo json_encode($list);
	}	

	public function getPage() {

		$db      = \Config\Database::connect();

		$id = $_REQUEST['id'];

		$list = [];

		$qPage = $db->query("SELECT * FROM pages WHERE id=".$id);
		$rPage = $qPage->getRow();
				
		$list = array(
			'status' => 1,
			'id' => $rPage->id,
			'titolo' =>$rPage->title,
			'content' =>$rPage->content
		);

		echo json_encode($list);
	}

	public function getProvince() {

		$db      = \Config\Database::connect();

		$list = [];

		$qPage = $db->query("SELECT * FROM province ORDER BY provincia");
		foreach ($qPage->getResult() as $rPage) { 
			$list[] = array(
				'id' => $rPage->id,
				'sigla' =>$rPage->sigla,
				'provincia' =>$rPage->provincia
			);
		}

		echo json_encode($list);
	}

	public function updateUserData() {

		$db      = \Config\Database::connect();
		$email = \Config\Services::email();

		helper('functions');

		$postData = file_get_contents("php://input");
    
		$list = [];
		$today = date("d/m/Y H:i:s");

		if (isset($postData)) {
			$request = json_decode($postData,true);

			$usr = $postData;

			$today = date("d/m/Y H:i:s");

			$usr = str_replace("}","",$usr);
			$usr = str_replace("{","",$usr);

			$datiUtente = explode(",", $usr);

			$cognome = str_replace('"','',$datiUtente[0]);
			$nome = str_replace('"','',$datiUtente[1]);
			$email = str_replace('"','',$datiUtente[2]);
			$psw = str_replace('"','',$datiUtente[3]);
			$nascita = str_replace('"','',$datiUtente[4]);

			$nome = str_replace('nome:','',$nome);
			$cognome = str_replace('cognome:','',$cognome);
			$email = str_replace('email:','',$email);
			$psw = str_replace('psw:','',$psw);
			$nascita = str_replace('nascita:','',$nascita);

			$builder = $db->table('t_user_info');
			$data = [
				'second_name' => $cognome,
				'first_name' => $nome,
				'birth_date' => $nascita,
				'email' => $email,
				'pwd' => $psw
			];
			$builder->where('email',$email);
			$builder->update($data);

			$list = array(
				'status' => true,
				'msg' => 'Aggiornamento dati eseguito',
				'email' => $email,
				'nome' => $nome,
				'cognome' => $cognome,
				'back' => 0  
			);

		}

		echo json_encode($list);

	}

	public function setUserPoints() {
		$db      = \Config\Database::connect();
		$points = $_REQUEST['points'];
		$builder = $db->table('t_user_info');
		$data = [
			'points' => $points
		];
		$builder->where('email','g.garofalo@interactive-mr.com');
		$builder->update($data);
		echo "ok".$points;
	}


	public function testQuery() {
		$db      = \Config\Database::connect();

		$qPage = $db->query("select * from t_user_info where email='enginelab@gmail.com'");
		$rPage = $qPage->getRow();

		print_r($rPage);
	}


	public function testPush() {
		$db      = \Config\Database::connect();
		helper('functions');
		sendMessage();
	}

	public function sendSinglePush($pushId,$msg) {
		$db      = \Config\Database::connect();
		helper('functions');
		sendMessagePush($pushId,$msg);
	}

	public function sendNotification() {

		$db      = \Config\Database::connect();
		$request = \Config\Services::request();

		helper('functions');

		$pushId = $this->request->getVar('pushId');
		$msg = $this->request->getVar('msg');

		sendMessagePush($pushId,$msg);
	}


	public function sendNotificationAll() {

		$db      = \Config\Database::connect();
		$request = \Config\Services::request();
		
		helper('functions');

		$msg = $this->request->getVar('msg');

		sendMessagePushAll($msg);
	}	

}
