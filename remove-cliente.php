<?php require_once("cabecalho.php"); ?>
<?php require_once("banco-cliente.php"); 
require_once("logica-usuario.php");

verificausuario();

$id = $_POST['id'];
removecliente($conexao, $id);
$_SESSION["success"] = "O cliente foi removido com sucesso.";
header("Location: cliente-lista.php");
die();
?>