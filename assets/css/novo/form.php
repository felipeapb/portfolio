<?
/*
$email="felipeapb@gmail.com";
$destinatario="felipeapb@gmail.com";
if ($email != "" and $destinatario != "")
{
  $cabecalho = "From: $email\nReply-To: $email";
  $corpo .= "Nome = $nome .\n";
  $corpo .= "Email = $email .\n";
  $corpo .= "Mensagem = $mensagem .\n\n";
  $corpo .="\n\n**********************************************\n";
  $corpo .= "Formulário do portifólio\n";
  $corpo .= "**********************************************";
  mail($destinatario, $assunto, $corpo, $cabecalho);
  echo ("&enviado=ok&");
}*/


$to = "superpluc@gmail.com";
$subject = "Olá, mundo!";
$html = "
Enviado com sucesso";
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";

if (mail($to, $subject, $html, $headers)) {
echo "Email enviado com sucesso !";
} else {
echo "Ocorreu um erro durante o envio do email.";
}

?>
