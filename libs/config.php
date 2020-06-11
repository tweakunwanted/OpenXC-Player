<?php


// URL DNS
define('IP','http://domain.com:80'); 

//pink, aqua, orange or blue themes
$template = 'blue'; 

// WhatsApp Number
define("WHATSAPP", ''); // WhatsApp Number

// Website 
define("NOME_IPTV", 'WebPlayer'); 

// MercadoPago Integration
// Create payment links in your account and put them here

define("LINK_PAGAR1", ''); // Link 1
define("LINK_PAGAR2", ''); // Link 2
define("LINK_PAGAR3", ''); // Link 3
define("LINK_PAGAR4", ''); // Link 4

$nome1 = "Monthly";
$valor1 = "29.90"; // Price for Month
$nome2 = "3 Months";
$valor2 = "79.90"; // Price for 3 Months
$nome3 = "6 Months";
$valor3 = "129.90"; // Price for 6 Months
$nome4 = "12 Months";
$valor4 = "199.90"; // Price for 12 Months

// Settings Xtream-Codes CMS 

define("ATIVAR_TESTE", '0');  // 1 = YES / 0 = NO
define("HORAS", '12');  // Trial Duration in hours
define("XTREAM_URL", 'https://cms-eu.xtream-codes.cm/'); //URL to Xtream-Codes CMS
define("XTREAM_USER", ''); //Xtream-Codes User
define("XTREAM_PWD", ''); //Xtream-Codes Password
define("XTREAM_PLANO", '1'); //Xtream-Codes Plan Number If in doubt contact support.
define("ATIVA_BLOQUEIO_TESTE", '0'); // If set to Enabled "1" = It will block new registrations from the user's computer for 30 days, avoid testing at all times.

// EMAIL SMTP SNDING SETTINGS TESTS:
define("SMTP_HOST", 'mail.revenda.com'); //Enter your SMTP host domain
define("SMTP_USER", ''); //Enter your SMTP Username here
define("SMTP_SENHA", ''); //Enter your SMTP Password here
define("SMTP_PORTA", '587'); //Enter your SMTP Port here
define("SMTP_SEGURANCA", 'tls'); //Enter your SMTP security here eg. ssl,tls,starttls
define("EMAIL_ASSUNTO", 'Bem Vindo ao ITV - WebPlayer'); //Email Subject
define("EMAIL_REVENDA", 'contato@revenda.com');
define("NOME_REVENDA", 'WebPlayer');

// Adults categories
define("AVISO_ADULTOS_CANAL", 'XXX: ADULTOS'); // Should be the same as XC
define("AVISO_ADULTOS_FILME", 'FILMES: ADULTOS'); // Should be the same as XC
// You can see this name when the system generates the categories


// USE CAUTION WHEN EDITING THE EMAIL BODY!
// Dont change the following variables
//
// %VENCIMENTO%, %NOME%, %USUARIO%, %SENHA%, %EXPIRATION%
//
// Ask a developer for help if needed.


define("CORPO_EMAIL", "Hello %NAME%, your test has been created successfully. <br> <br>
     You can login to our webplayer using the following credentials: <br>
     <br>
     User: <b>% USER% </b> <br>
     Password: <b>% PASSWORD% </b> <br> <br> <br>
     
     Enjoy your test is valid until:%EXPIRATION% <br> <br> <br>
    
     Thank you <br>
     WebPlayer.
    
    ");
