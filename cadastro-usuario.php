<?php require_once("banco-usuario.php");
require_once("mostra-alerta.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$hierarquia = $_POST['hierarquia'];

if($nome!="" and $email!="" and $senha!="")
{
	insereusuario($conexao, $nome, $email, $senha, $hierarquia);
	$_SESSION["success"] = "O usuario foi cadastrado com sucesso.";
} else {
	$_SESSION["danger"] = "O usuario não foi cadastrado, preencha todos os campos.";
}

header("Location:cadastro-usuario-formulario.php");