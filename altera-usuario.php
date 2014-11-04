<?php require_once("banco-usuario.php");
require_once("logica-usuario.php");
require_once("mostra-alerta.php");
verificausuario();

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$hierarquia = $_POST['hierarquia'];
$pag2 = $_POST['pag2'];
$hiera = usuario_hierarquia($conexao);

if($pag2 == "sim")
{
if($nome!="" and $email!="")
	{
		alterausuario2($conexao, $email, $nome, $id);
		$_SESSION["success"] = "O usuario foi alterado com sucesso.";
	} else {
		$_SESSION["danger"] = "O usuario não foi alterado, preencha todos os campos.";
	}
	header("Location:index.php");
} else {
if($nome!="" and $email!="" and $hiera=='1')
	{
		alterausuario($conexao, $email, $hierarquia, $nome, $id);
		$_SESSION["success"] = "O usuario foi alterado com sucesso.";
	} else {
		$_SESSION["danger"] = "O usuario não foi alterado, preencha todos os campos.";
	}
	header("Location:usuario-lista.php");
}
