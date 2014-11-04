<?php require_once("banco-cliente.php");
require_once("banco-agenda.php");
require_once("conecta.php");
require_once("converte-data.php");
require_once("logica-usuario.php");

verificausuario();

$id = $_POST['id'];
$cliente_id = $_POST['cliente_id'];
$cliente = buscacliente($conexao,$cliente_id);
$titulo = $_POST['titulo'];
$data1 = $_POST['data'];
$data = convertedatapratraco($data1);
$hora = $_POST['hora'];
$endereco = $_POST['endereco'];
$detalhes = $_POST['detalhes'];
$usuario_id = $_SESSION["usuario_logado"];

if($titulo!="" and $data!="" and $hora!="" and $endereco!="" and $detalhes !="")
{
	alteraagenda($conexao, $id, $titulo, $data, $hora, $endereco, $detalhes);
	$_SESSION["success"] = "O evento foi alterado com sucesso.";
} else {
	$_SESSION["danger"] = "O evento não foi alterado.";
}

header("Location: agenda-lista.php");