<?php
require_once("logica-usuario.php");

verificausuario();

$de = $_POST['de'];
$para = $_POST['para'];
$nome = $_POST['nome'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
$pag2 = $_POST['pag2'];

$erros = 1;

$headers = "From: '{$de}'" . "\r\n" .
    "Reply-To: '{$de}'" . "\r\n" .
    'X-Mailer: PHP/'. phpversion();

$conteudo = "<strong>Nome:</strong> '{$nome}'<br />";
$conteudo .= "<strong>Email:</strong> {$de} <br />";
$conteudo .= "<strong>Assunto:</strong> '{$assunto}'<br />";
$conteudo .= "<strong>Mensagem:</strong> '{$mensagem}'<br />";

if($de!="" and $nome!="" and $assunto!="" and mensagem!="")
{
	mail($para, $assunto, $mensagem, $headers);
	$_SESSION['success'] = "Email enviado para '{$para}' com sucesso!";
} else {
	$_SESSION['danger'] = "O Email para'{$para}' não pode ser enviado";
}

if($pag2=="sim")
{
	header("Location:index.php");
} else {
	header("Location:cliente-lista.php");
}

?>