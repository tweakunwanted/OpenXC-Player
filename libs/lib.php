<?php
date_default_timezone_set("America/Sao_Paulo"); // Timezone
ini_set("allow_url_fopen", 1);
ini_set("display_errors", 0);
error_reporting(0);
ini_set("track_errors","0");

require_once("libs/config.php");
require_once("libs/idioma.php");

$vl1 = explode(".",$valor1);
$vl2 = explode(".",$valor2);
$vl3 = explode(".",$valor3);
$vl4 = explode(".",$valor4);
// END

// Funções do Sistema

function apixtream($url_api){	
$ch = curl_init();	
$timeout = 10;	
curl_setopt ($ch, CURLOPT_URL, $url_api);	
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);	
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);	
$retorno = curl_exec($ch);	
curl_close($ch);	
return $retorno;
}

function gerar_hash($length) {
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' . rand(0, 99999);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
  $randomString .= $characters[rand(0, strlen($characters) - 1)];
}
return $randomString;
}

function limitar_texto($texto, $limite){
  $contador = strlen($texto);
  if ( $contador >= $limite ) {      
    $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '';
    return $texto;
  }
  else{
    return $texto;
  }
} 

function ds($ds) {
	
	$dataent = explode(" ",$ds);
	$dsent1 = $dataent[0];
	$datas = explode("-",$dsent1);
	
	$datacerta = $datas[2] . '/'.$datas[1].'/'.$datas[0];
	
	return $datacerta . ' ' . $dataent[1];
	
}

function avaliacao($avs) {
	
	if($avs == 0){
		$res = '<i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>';
	}
	if(($avs >= 1) && ($media <= 1.99)){
		$res = '<i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>';
	}
	if(($avs >= 2) && ($media <= 2.99)){
		$res = '<i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>';
	}
	if(($avs >= 3) && ($media <= 3.99)){
		$res = '<i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>';
	}
	if(($avs >= 4) && ($media <= 4.99)){
		$res = '<i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>';
	}
	if(($avs >= 5)){
		$res = '<i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>';
	}
	return $res;

}

if($_GET['acao'] == 'sair') {
  session_unset();
  session_destroy();
  setcookie('xuserm');
  setcookie('xpwdm');
  setcookie('xstatusm');
  setcookie('xconnm');
  setcookie('xtestem');
  setcookie('xdataexpm');
  header("Location: index.php");	
}

function thor($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = '9991';
    $secret_iv = '1119';
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - método de criptografia AES-256-CBC espera 16 bytes - senão você receberá um aviso
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encode' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decode' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}
?>