<?php
require_once("banco-usuario.php");
require_once("logica-usuario.php");
if(usuarioestalogado()){
$usuariolog = buscausuarioapenas($conexao,usuariologado()); }

$usuario = buscausuario($conexao, $_POST["email"], $_POST["senha"]);
if($usuario == null)
{
	$_SESSION["danger"] = "Usuário ou senha inválido.";
	header("Location: index.php");
} else {
	$_SESSION["success"] = "Usuário ".$usuariolog['email']." logado com sucesso.";
	header("Location: index.php");
	logausuario($usuario["id"]);
}
die();












/*if($usuario == null)
{
	header("Location: index.php?login=0");
} else {
	header("Location: index.php?login=1");
	logausuario($usuario["email"]);
}
die();*/
