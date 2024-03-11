<?php

function dateHour($value) {
	$dateHour = date('d/m/Y H:i:s', strtotime($value));
	return $dateHour;
}

function dateHour2($value) {
	$dateHour = date('d/m/Y H:i', strtotime($value));
	return $dateHour;
}

function onlyHour($value) {
	$dateHour = date('H:i', strtotime($value));
	return $dateHour;
}

function dateIta($value) {
	if($value!='' || !empty($value)) {
		$dateHour = date('d/m/Y', strtotime($value));
		//$dateHour = DateTime::createFromFormat('d/m/Y', $value);
		return $dateHour;
	} else {
		return;
	}
}

function calcola_distanza($latitude1, $longitude1, $latitude2, $longitude2) {
  $theta = $longitude1 - $longitude2;
  $miles = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
  $miles = acos($miles);
  $miles = rad2deg($miles);
  $miles = $miles * 60 * 1.1515;
  $kilometers = $miles * 1.609344;
  $meters = $kilometers * 1000;
  return $meters; 
}


function instrLevel($id) {
  switch($id) {
	case 1:
	$stato='Scuola Elementare';
	break;
	case 2:
	$stato='Scuola Media';
	break;
	case 3:
	$stato='Scuola Secondaria';
	break;
	case 4:
	$stato='Diploma Universitario';
	break;
	case 5:
	$stato='Laurea';
	break;
	case 5:
	$stato='Specializzazione Post-Laurea';
	break;
	default:
	$stato='//';
	break;
  }
  return $stato;
}


function marStatus($id) {
	switch($id) {
	  case 1:
	  $stato='Single';
	  break;
	  case 2:
	  $stato='Sposato';
	  break;
	  case 3:
	  $stato='Divorziato';
	  break;
	  case 4:
	  $stato='Separato';
	  break;
	  case 5:
	  $stato='Vedovo';
	  break;
	  default:
	  $stato='//';
	  break;
	}
	return $stato;
  }

function statusActive($id) {
	
	switch($id) {
	  case 1:
	  $tipo ='<span class="label label-success">Attivo</span>';
	  break;
	  case 0:
	  $tipo ='<span class="label label-danger">Non attivo</span>';
	  break;
	}

	return $tipo;
}


function statusOpen($id) {
	
	switch($id) {
	  case 1:
	  $tipo ='<span class="label label-success">Aperto</span>';
	  break;
	  case 0:
	  $tipo ='<span class="label label-danger">Chiuso</span>';
	  break;
	}

	return $tipo;
}


function orderPercent($total,$part) {
	$percent = ($part * 100) / $total;
	return $percent;
}

	
function replaceUrlSpecial($text) {
	$specChars = array(
		'%22' => '"', '%20' => '',
		'%E0' => 'à', '%C3' => 'Ã',
		'%E8' => 'è', '%E9' => 'é',
		'%EC' => 'ì', '%B4' => ' ',
		'%F9' => 'ù', '%A8' => '..',
		'%F2' => 'ò', '%91' => "'", '%A0' => ' ',
		'Ã%B2' => 'ò'
	);
	
	foreach ($specChars as $k => $v) {
		$text = str_replace($k, $v, $text);
	}
	
	return $text;
}


function companyCategory($id) {
	$ci =& get_instance();

	$qCat = $ci->db->query("
	SELECT company_cat.*
	FROM company_cat 
	WHERE id=".$id);

	$rCat = $qCat->row();

	return $rCat->name;

}



function generateNewPsw($email) {
	
	$email = substr($email, 0, 4);
	$email = str_replace('.','',$email);
	$email = strtolower($email);
	
	$characters = 'abcdefghilmnopqrtsuvzxy';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 3; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
	
	$num = rand(100, 999);
	
	$psw = $email.$num.$randomString;
	return $psw;
}


function generateUID() {

	$characters = 'abcdefghilmnopqrtsuvzxy0123456789';
	$characters = strtoupper($characters);
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

	return $randomString;
}


function checkNumDay($giorno) {
	$arday = array('Lunedi','Martedi','Mercoledi','Giovedi','Venerdi','Sabato','Domenica');
	for($i=1;$i<=7;$i++) {
		if($arday[$i]==date("N")) {
			if($giorno==$arday[$i]) {
				return true;
			} else {
				return false;
			}
		}
	}
}


function getNumDay($giorno) {
	$arday = array('Lunedi','Martedi','Mercoledi','Giovedi','Venerdi','Sabato','Domenica');
	for($i=1;$i<=7;$i++) {
		if($arday[$i]==$giorno) {
			return ($i+1);
		}
	}
}

function getNameDay($giorno) {
	$arday = array('Lunedi','Martedi','Mercoledi','Giovedi','Venerdi','Sabato','Domenica');
	return ($arday[$giorno-1]);
}


//differenza in minuti
function checkMinute ($d1,$d2,$differenceFormat = '%i' ) {
	$datetime1 = date_create($d1);
	$datetime2 = date_create($d2);
 
	$interval = date_diff($datetime1, $datetime2);

	$to_time = strtotime($d2);
	$from_time = strtotime($d1);
	return round(($to_time - $from_time) / 60);
	
	//return $interval->format($differenceFormat); 
}

//differenza in giorni
function checkDays ($d1,$d2,$differenceFormat = '%d' ) {
	$datetime1 = date_create($d1);
	$datetime2 = date_create($d2);
 
	$interval = date_diff($datetime1, $datetime2);

	$to_time = strtotime($d2);
	$from_time = strtotime($d1);
	return round(abs($to_time - $from_time) / 86400);
}


function NoSpaceData($url) {
	$url=str_replace(",","",$url);
	$url=str_replace(";","",$url);
	$url=str_replace("'","",$url);
	$url=str_replace("&","e",$url);
	$url=str_replace("è","e",$url);
	$url=str_replace("à","a",$url);
	$url=str_replace("ò","o",$url);
	$url=str_replace("ù","u",$url);
	return $url;
}


function array_insert($array, $position, $insert) {
    if (is_int($position)) {
        array_splice($array, $position, 0, $insert);
    } else {
        $pos   = array_search($position, array_keys($array));
        $array = array_merge(
            array_slice($array, 0, $pos),
            $insert,
            array_slice($array, $pos)
        );
    }
}


function listdir_by_date($path){
    $dir = opendir($path);
    $list = array();
    while($file = readdir($dir)){
        if ($file != '.' and $file != '..'){
            // add the filename, to be sure not to
            // overwrite a array key
            $ctime = filectime($data_path . $file) . ',' . $file;
            $list[] = $file;
        }
    }
    closedir($dir);
    krsort($list);
    return $list;
}



function randomColor() {
	$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
	$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	return $color;
}


function sendMessage() {
    $content      = array(
        "en" => 'Millebytes motifica push di test'
    );
    $hashes_array = array();
    array_push($hashes_array, array(
        "id" => "like-button",
        "text" => "Like",
        "icon" => "https://millebytes.com/assets/img/milleicon.png",
        "url" => "https://millebytes.com"
    ));
    array_push($hashes_array, array(
        "id" => "like-button-2",
        "text" => "Like2",
        "icon" => "https://millebytes.com/assets/img/milleicon.png",
        "url" => "https://millebytes.com"
    ));
    $fields = array(
        'app_id' => "d7274713-a3f0-4844-922c-f00b236f2125",
        'included_segments' => array(
            'Subscribed Users'
        ),
        'data' => array(
            "foo" => "bar"
        ),
        'contents' => $content,
        'web_buttons' => $hashes_array
    );
    
    $fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic YmJmY2U3OTMtOGZlNy00NGIwLTlkNzctYjY2ZjUxN2ExMjMy'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
	print_r($response);
    return $response;
}

function sendMessagePush($pushId,$msg) {
    $content      = array(
        "it" => $msg
    );
    $hashes_array = array();
    array_push($hashes_array, array(
        "id" => "like-button",
        "text" => "Like",
        "icon" => "https://millebytes.com/assets/img/milleicon.png",
        "url" => "https://millebytes.com"
    ));
    array_push($hashes_array, array(
        "id" => "like-button-2",
        "text" => "Like2",
        "icon" => "https://millebytes.com/assets/img/milleicon.png",
        "url" => "https://millebytes.com"
    ));
    $fields = array(
        'app_id' => "d7274713-a3f0-4844-922c-f00b236f2125",
        'include_external_user_ids' => array($pushId),
        'data' => array(
            "foo" => "bar"
        ),
		'name' => 'Millebytes',
        'contents' => $content,
        'web_buttons' => $hashes_array
    );
    
    $fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic YmJmY2U3OTMtOGZlNy00NGIwLTlkNzctYjY2ZjUxN2ExMjMy'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
	print_r($response);
    return $response;
}

function sendMessagePushAll($msg) {
    $content      = array(
        "it" => $msg
    );
    $hashes_array = array();
    array_push($hashes_array, array(
        "id" => "like-button",
        "text" => "Like",
        "icon" => "https://millebytes.com/assets/img/milleicon.png",
        "url" => "https://millebytes.com"
    ));
    array_push($hashes_array, array(
        "id" => "like-button-2",
        "text" => "Like2",
        "icon" => "https://millebytes.com/assets/img/milleicon.png",
        "url" => "https://millebytes.com"
    ));
    $fields = array(
        'app_id' => "d7274713-a3f0-4844-922c-f00b236f2125",
        'included_segments' => array(
            'Subscribed Users'
        ),
        'data' => array(
            "foo" => "bar"
        ),
        'contents' => $content,
        'web_buttons' => $hashes_array
    );
    
    $fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic YmJmY2U3OTMtOGZlNy00NGIwLTlkNzctYjY2ZjUxN2ExMjMy'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
	print_r($response);
    return $response;
}

?>