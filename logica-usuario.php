<?php
session_start(); 

require_once("conecta.php"); 

function usuarioestalogado()
{
	return isset($_SESSION["usuario_logado"]);
}

function verificausuario()
{
	if(!usuarioestalogado())
	{
		$_SESSION["danger"] = "Você não tem acesso à esta funcionalidade.";
		header("Location: index.php?falhadeseguranca=true");
		die();
	}
}

function usuariologado()
{
	return $_SESSION["usuario_logado"];
}

function logausuario($id)
{
	$_SESSION["usuario_logado"] = $id;
}

function logout()
{
	unset($_SESSION["usuario_logado"]);
	/*session_destroy()
	session_create()*/
}

function usuario_email($conexao)
{	
	$id = $_SESSION["usuario_logado"];
	$query =  "select email from usuarios where id = {$id}";
	$resultado = mysqli_query($conexao,$query);
	$email = mysqli_fetch_assoc($resultado);
	return $email['email'];
}

function usuario_nome($conexao)
{	
	$id = $_SESSION["usuario_logado"];
	$query =  "select nome from usuarios where id = {$id}";
	$resultado = mysqli_query($conexao,$query);
	$nome = mysqli_fetch_assoc($resultado);
	return $nome['nome'];
}

function usuario_hierarquia($conexao)
{
	if($id = $_SESSION["usuario_logado"]){
	$query =  "select hierarquia from usuarios where id = {$id}";
	$resultado = mysqli_query($conexao,$query);
	$hiera = mysqli_fetch_assoc($resultado);
	return $hiera['hierarquia'];}
}

function verifica_hierarquia($conexao)
{
	if(usuario_hierarquia($conexao)!=1)
	{
		$_SESSION["danger"] = "Você não tem acesso à esta funcionalidade.";
		header("Location: index.php?falhadeseguranca=true");
		die();
	}
}