<?php require_once("banco-usuario.php");

$id = $_POST['id'];
$email = $_POST['email'];

removeusuario($conexao,$id);
$_SESSION["success"] = "O usuário foi removido com sucesso.";

header("Location:usuario-lista.php");
