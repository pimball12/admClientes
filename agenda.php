<?php require_once("banco-agenda.php");
require_once("conecta.php");
require_once("converte-data.php");
require_once("logica-usuario.php");

verificausuario();
$pag2 = $_POST['pag2'];

	$cliente_id = $_POST['nome'];

$titulo = $_POST['titulo'];
$data1 = $_POST['data'];
$data = convertedatapratraco($data1);
$hora = $_POST['hora'];
$endereco = $_POST['endereco'];
$detalhes = $_POST['detalhes'];
$usuario_id = $_SESSION["usuario_logado"];

if($titulo!="" and $data!="" and $hora!="" and $endereco!="" and $detalhes!="")
{
	insereagenda($conexao, $cliente_id, $titulo, $data, $hora, $endereco, $detalhes, $usuario_id);
	$_SESSION["success"] = "O evento foi agendado com sucesso.";
} else {
	$_SESSION["danger"] = "O evento não foi agendado.";
}

header("Location: cliente-lista.php");