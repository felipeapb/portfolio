<?php

###########################################################################
# ENVIO DE EMAIL DO CONTATO
###########################################################################

$nome     = ucwords(strtolower(utf8_decode($_POST['nome'])));
$email    = utf8_decode($_POST['email']);
$assunto  = utf8_decode($_POST['assunto']);
$mensagem = utf8_decode($_POST['mensagem']);

/*
$nome     = ucwords(strtolower(utf8_decode('felipe')));
$email    = utf8_decode('felipeapb@gmail.com');
$assunto  = utf8_decode('felipe');
$mensagem = utf8_decode('ww');
*/
if( !empty($nome) && !empty($email) && !empty($assunto) && !empty($mensagem) ) {
	$to      = 'felipeapb@gmail.com';
	$subject = 'Formulário preenchido em www.felipeantunes.com';
	$headers = 'Content-type: text/html';

	// Mensagem HTML do email
	$message = "<table cellpadding='0' cellspacing='0' border='0' bgcolor='#FFFFFF' width='400' align='center'><tr><td align='center'><SPAN style=\"FONT-SIZE: 8.5pt; COLOR: #333333; FONT-FAMILY: Verdana\">Formulário preenchido no site www.felipeantunes.com:</span><p></td></tr><tr><td><HR style='WIDTH: 375pt' align='center' width='500' color='#333333' noShade SIZE='1'></td></tr><tr><td valign='top' align='left'><SPAN style=\"FONT-WEIGHT: bold; FONT-SIZE: 8.5pt; COLOR: #333333; FONT-FAMILY: Verdana\">
	Nome: </span><SPAN style=\"FONT-SIZE: 8.5pt; COLOR: #333333; FONT-FAMILY: Verdana\">".$nome."</span></td></tr><tr><td><HR style='WIDTH: 375pt' align=center width=500 color=#333333 noShade SIZE=1></td></tr><tr><td valign='top' align='left'><SPAN style=\"FONT-WEIGHT: bold; FONT-SIZE: 8.5pt; COLOR: #333333; FONT-FAMILY: Verdana\">
	Data: </span><SPAN style=\"FONT-SIZE: 8.5pt; COLOR: #333333; FONT-FAMILY: Verdana\">".date('d-m-Y H:i:s')."</span></td></tr><tr><td><HR style='WIDTH: 375pt' align=center width=500 color=#333333 noShade SIZE=1></td></tr><tr><td valign='top' align='left'><SPAN style=\"FONT-WEIGHT: bold; FONT-SIZE: 8.5pt; COLOR: #333333; FONT-FAMILY: Verdana\">
	Email: </span><SPAN style=\"FONT-SIZE: 8.5pt; COLOR: #333333; FONT-FAMILY: Verdana\">".$email."</span></td></tr><tr><td><HR style='WIDTH: 375pt' align=center width=500 color=#333333 noShade SIZE=1></td></tr><tr><td valign='top' align='left'><SPAN style=\"FONT-WEIGHT: bold; FONT-SIZE: 8.5pt; COLOR: #333333; FONT-FAMILY: Verdana\">
	Assunto: </span><SPAN style=\"FONT-SIZE: 8.5pt; COLOR: #333333; FONT-FAMILY: Verdana\">".$assunto."</span></td></tr><tr><td><HR style='WIDTH: 375pt' align=center width=500 color=#333333 noShade SIZE=1></td></tr><tr><td valign='top' align='left'><SPAN style=\"FONT-WEIGHT: bold; FONT-SIZE: 8.5pt; COLOR: #333333; FONT-FAMILY: Verdana\">
	Mensagem: </span><SPAN style=\"FONT-SIZE: 8.5pt; COLOR: #333333; FONT-FAMILY: Verdana\">".$mensagem."</span></td></tr><tr><td><HR style='WIDTH: 375pt' align=center width=500 color=#333333 noShade SIZE=1></td></tr></table>"; 

	if(mail($to, $subject, $message, $headers)) {
    	echo 'ok';
	} else {
		echo 'erro2';
	}  
  
} else {
	echo 'erro1';
}
  
?>