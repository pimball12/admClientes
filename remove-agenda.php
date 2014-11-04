<?php require_once("cabecalho.php");
require_once("banco-agenda.php");

$id = $_POST['id'];
removeagenda($conexao, $id);
$_SESSION["success"] = "O compromisso foi removido com sucesso.";
header("Location: agenda-lista.php");
die();