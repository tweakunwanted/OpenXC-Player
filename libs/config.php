<?php


// URL DNS
define('IP','http://domain.com:80'); 

//pink, aqua, orange or blue themes
$template = 'blue'; 

// WhatsApp Number
define("WHATSAPP", ''); //Numero WhatsApp

// Website 
define("NOME_IPTV", 'WebPlayer'); 

// MercadoPago Integration
// Create payment links in your account and put them here

define("LINK_PAGAR1", ''); // Link 1
define("LINK_PAGAR2", ''); // Link 2
define("LINK_PAGAR3", ''); // Link 3
define("LINK_PAGAR4", ''); // Link 4

$nome1 = "Mensal";
$valor1 = "29.90"; // Valor Mensal
$nome2 = "Trimestral";
$valor2 = "79.90"; // Valor Mensal
$nome3 = "Semestral";
$valor3 = "129.90"; // Valor Mensal
$nome4 = "Anual";
$valor4 = "199.90"; // Valor Mensal

// Settings Xtream-Codes CMS 

define("ATIVAR_TESTE", '0');  // 1 = YES / 0 = NO
define("HORAS", '2');  // Trial Duration in hours
define("XTREAM_URL", 'https://cms-eu.xtream-codes.com/'); //URL CMS do Xtream-Codes
define("XTREAM_USER", ''); //Usuário do Xtream-Codes
define("XTREAM_PWD", ''); //Senha do Xtream-Codes
define("XTREAM_PLANO", '1'); //Número do Plano do Xtream-Codes em caso de dúvidas contate o suporte.
define("ATIVA_BLOQUEIO_TESTE", '0'); // Se Ativado (1) = Bloqueia novos cadastros apartir do computador do usuário por 30 dias, evitar testes a todo momento

// CONFIGURAÇÕES DO EMAIL SMTP ENVIO DE TESTES:
define("SMTP_HOST", 'mail.revenda.com');
define("SMTP_USER", '');
define("SMTP_SENHA", '');
define("SMTP_PORTA", '587');
define("SMTP_SEGURANCA", 'tls');
define("EMAIL_ASSUNTO", 'Bem Vindo ao ITV - WebPlayer');
define("EMAIL_REVENDA", 'contato@revenda.com');
define("NOME_REVENDA", 'WebPlayer');

// Adults categories
define("AVISO_ADULTOS_CANAL", 'XXX: ADULTOS'); // Should be the same as XC
define("AVISO_ADULTOS_FILME", 'FILMES: ADULTOS'); // Should be the same as XC
// Você pode ver esta nome quando o sistema gerar as categorias


// ATENÇÃO AO EDITAR O CORPO DO EMAIL
// Dont change the variables
//
// %VENCIMENTO%, %NOME%, %USUARIO%, %SENHA%
//
// Ask a developer for help if needed.


define("CORPO_EMAIL", "Olá %NOME%, seu teste foi criado com sucesso.<br><br>
    Você pode fazer seu login em nosso webplayer utilizando os seguintes dados:<br>
    <br>
    Usuário: <b>%USUARIO%</b> <br>
    Senha: <b>%SENHA%</b> <br><br><br>
    Você também pode testar nossa lista fazendo o download abaixo:<br><br>
    %URL_LISTA%<br><br><br>
    Aproveite seu teste é valido até: %VENCIMENTO%<br><br><br>
    
    Obrigado<br>
    WebPlayer.
    
    ");
