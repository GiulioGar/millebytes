<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiModel extends Model {

    var $client_service = "millebytes-client";
    var $auth_key       = "m3d4v1t44p1";

    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->email = \Config\Services::email();
    }

    public function check_auth_client($client_service,$auth_key) {

        if($client_service == $this->client_service && $auth_key == $this->auth_key){
            return true;
        } else {
            return json_output(401,array('status' => 401, 'message' => 'Unauthorized'));
        }
    }


    public function login($email,$psw,$token,$pid) {

		$list = [];
		$today = date("d/m/Y H:i:s");

        $qUser = $this->db->query("SELECT * FROM t_user_info WHERE email = '".$email."' AND pwd='".md5($psw)."' AND confirm=1");
    
        if($nUser = $qUser->getNumRows()>0) {

            $rUser = $qUser->getRow();

            $builder = $this->db->table('t_user_info');
            $data = [
                'pid' => $pid,
                'token' => $token
            ];
            $builder->where('email',$email);
            $builder->update($data);

            //genero e salvo il token
            $tokenAuth = bin2hex(random_bytes(16));

            $builder2 = $this->db->table('t_user_token');
			$dataQ = [
				'user_id' => $rUser->user_id,
				'token' => $tokenAuth
			];
			$builder2->insert($dataQ);
            
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
                'msg' => 'User not found'
            );

        }

        return $list;

			
	} 
   

    public function doCart($idp,$idu) {

        $list = [];
        $today = date("Y-m-d H:i:s");

        $qCart = $this->db->query("SELECT * FROM premi WHERE id=".$idp);
		$rSEnv = $qCart->getRow();

		$qUser = $this->db->query("SELECT * FROM t_user_info WHERE t_user_info.user_id='".$idu."' AND confirm=1 LIMIT 1");

        if($nUser = $qUser->getNumRows()>0) {

            $rUser = $qUser->getRow();

            $qToken = $this->db->query("
                SELECT t_user_token.*
                FROM t_user_token 
                WHERE t_user_token.user_id='".$idu."' 
                ORDER BY data_add 
                LIMIT 1
            ");

            if($nToken = $qToken->getNumRows()>0) {

                $rToken = $qToken->getRow();

                $to_time = strtotime($rToken->data_add);
                $from_time = strtotime($today);
                $minuti = round(($to_time - $from_time) / 60);

                if($minuti<500) {
                
                    if($rUser->points>=$rSEnv->punti) {

                        $points = $rUser->points - $rSEnv->punti;

                        $builder = $this->db->table('t_user_info');
                        $builder->set('points', $points);
                        $builder->where('user_id', $idu);
                        $builder->update();

                        $builder2 = $this->db->table('t_user_history');
                        $dataQ = [
                            'user_id' => $idu,
                            'event_date' => date('Y-m-d H:i:s'),
                            'event_type' => 'withdraw',
                            'event_info' => $rSEnv->nome.' '.$rSEnv->valore.' euro',
                            'prev_level' => $rUser->points,
                            'new_level' => $points,
                            'ip' => $_SERVER['REMOTE_ADDR']
                        ];
                        $builder2->insert($dataQ);

                        /*
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

                            exit;

                        }
                        */

                        $list = array(
                            'status' => true,
                            'msg' => 'Richiesta premio effettuata con successo',
                            'idu' => $idu,
                            'points' => $rUser->points,
                            'back' => 1  
                        );

                    } else {

                        $list = array(
                            'status' => false,
                            'msg' => 'Non hai i punti necessari per richiedere il premio',
                            'idu' => $idu,
                            'points' => $rUser->points,
                            'back' => 1  
                        );
                    }

                } else {
                    $list = array(
                        'status' => false,
                        'msg' => 'Utente non autorizzato. Rifare il login e ripetere la richiesta',
                        'idu' => $idu,
                        'points' => 0,
                        'back' => 1  
                    );
                }

            } else {

                $list = array(
                    'status' => false,
                    'msg' => 'Utente non autorizzato. Rifare il login e ripetere la richiesta',
                    'idu' => $idu,
                    'points' => 0,
                    'back' => 1  
                );

            }

        } else {

            $list = array(
                'status' => false,
                'msg' => 'Utente non trovato o non autorizzato',
                'idu' => $idu,
                'points' => 0,
                'back' => 1  
            );

        }

        return $list;
    }

}