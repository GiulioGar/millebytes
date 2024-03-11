<?php

function json_output($statusHeader,$response) {
	echo json_encode($response);
}

function dateIta($value) {
	if($value!='' || !empty($value)) {
		$dateHour = date('d/m/Y', strtotime($value));
		return $dateHour;
	} else {
		return;
	}
}

function file_get_contents_curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);      
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}


function get_web_page($url) {
	$user_agent='Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';

	$options = array(

		CURLOPT_CUSTOMREQUEST  =>"GET",        //set request type post or get
		CURLOPT_POST           =>false,        //set to GET
		CURLOPT_USERAGENT      => $user_agent, //set user agent
		CURLOPT_COOKIEFILE     =>"cookie.txt", //set cookie file
		CURLOPT_COOKIEJAR      =>"cookie.txt", //set cookie jar
		CURLOPT_RETURNTRANSFER => true,     // return web page
		CURLOPT_HEADER         => false,    // don't return headers
		CURLOPT_FOLLOWLOCATION => true,     // follow redirects
		CURLOPT_ENCODING       => "",       // handle all encodings
		CURLOPT_AUTOREFERER    => true,     // set referer on redirect
		CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
		CURLOPT_TIMEOUT        => 120,      // timeout on response
		CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
	);

	$ch      = curl_init( $url );
	curl_setopt_array( $ch, $options );
	$content = curl_exec( $ch );
	$err     = curl_errno( $ch );
	$errmsg  = curl_error( $ch );
	$header  = curl_getinfo( $ch );
	curl_close( $ch );

	$header['errno']   = $err;
	$header['errmsg']  = $errmsg;
	$header['content'] = $content;
	return $header;
}


function replaceH($readability) {
	$output = str_replace("h2","h1",$readability);
	$output = str_replace("h3","h1",$output);
	$output = str_replace("h4","h1",$output);
	$output = str_replace("h5","h1",$output);
	$output = str_replace("h6","h1",$output);
	return $output;
}

function readBlock($values) {
	$block = [];
	$pos = strpos($values, "</h1>");
	$block['title'] = strip_tags(substr($values,0,$pos));
	$block['content'] = substr($values,$pos+5);
	$block['content'] = strip_tags($block['content'],['p','ul','li','br','i']);
	$block['content'] = str_replace("<div>","",$block['content']);
	$block['content'] = str_replace("</div>","",$block['content']);
	$block['content'] = str_replace("&#xD;","",$block['content']);
	return $block;
}