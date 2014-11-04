<?php require_once("cabecalho.php");
require_once("logica-usuario.php");
require_once("banco-usuario.php");
verificausuario();

$id = $_POST['id'];
$adm = $_POST['adm'];

if(usuariologado()!=$id)
{
	verifica_hierarquia($conexao);
}

if($adm=='sim')
{
	$usuario = buscausuarioapenas($conexao, $id);
	$senha1 = $_POST['senha1'];
	$senha2 = $_POST['senha2'];

	if($senha1==$senha2 and $senha1!="" and $senha2!="")
	{
		alterasenha($conexao, $senha1, $id);
		$_SESSION['success'] = "A senha foi alterada.";
		header("Location:usuario-lista.php");
	} else {
		$_SESSION['danger'] = "A senha não foi alterada, verifique se há erros na digitação.";
		header("Location:trocar-senha-formulario-adm.php?id={$id}");
	}
} else {
	$usuario = buscausuarioapenas($conexao, $id);
	$senha = $_POST['senha'];
	$senha1 = $_POST['senha1'];
	$senha2 = $_POST['senha2'];

	if($usuario['senha']== md5($senha) and $senha1==$senha2 and $senha!="" and $senha1!="" and $senha2!="")
	{
		alterasenha($conexao, $senha1, $id);
		$_SESSION['success'] = "A senha foi alterada.";
		header("Location:index.php");
	} else {
		$_SESSION['danger'] = "A senha não foi alterada, verifique se há erros na digitação.";
		header("Location:trocar-senha-formulario.php");
	}
}