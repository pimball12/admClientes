<?php
require_once("conecta.php");
function buscausuario($conexao, $email, $senha)
{	
	$senhamd5 = md5($senha);
	$email = mysqli_real_escape_string($conexao, $email);
	$query = "select * from usuarios where email='{$email}' and senha='{$senhamd5}'";
	$resultado = mysqli_query($conexao,$query);
	$usuario = mysqli_fetch_assoc($resultado);
	return $usuario;
}

function insereusuario($conexao, $nome, $email, $senha, $hierarquia)
{
	$senhamd5 = md5($senha);
	$query = "insert into usuarios(nome, email, senha, hierarquia) values('{$nome}','{$email}','{$senhamd5}',{$hierarquia})";
	$resultado = mysqli_query($conexao, $query);
}


function listausuario($conexao)
{
	$usuarios = array();
	$query = "select * from usuarios";
	$resultado = mysqli_query($conexao,$query);
	while($usuario = mysqli_fetch_assoc($resultado))
	{
		array_push($usuarios,$usuario);
	}
	return $usuarios;
}

function alterausuario($conexao, $email, $hierarquia, $nome, $id)
{
	$query = "update usuarios set nome ='{$nome}', email = '{$email}', hierarquia={$hierarquia} where id = '{$id}'";
	return mysqli_query($conexao, $query);
}

function alterausuario2($conexao, $email, $nome, $id)
{
	$query = "update usuarios set nome ='{$nome}', email = '{$email}' where id = '{$id}'";
	return mysqli_query($conexao, $query);
}

function alterasenha($conexao, $senha, $id)
{
	$senhamd5 = md5($senha);
	$query = "update usuarios set senha ='{$senhamd5}' where id = '{$id}'";
	return mysqli_query($conexao, $query);
}


function removeusuario($conexao,$id)
{
	$query = "delete  from usuarios where id = {$id}";
	$resultado =  mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscausuarioapenas($conexao, $id)
{	
	$query = "select * from usuarios where id={$id}";
	$resultado = mysqli_query($conexao,$query);
	$usuario = mysqli_fetch_assoc($resultado);
	return $usuario;
}