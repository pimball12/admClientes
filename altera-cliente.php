<?php require_once("cabecalho.php"); ?>
<?php require_once("banco-cliente.php"); ?>
<?php require_once("logica-usuario.php");

verificausuario();

$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$cnpj = $_POST['cnpj'];
$endereco = $_POST['endereco'];
$n = $_POST['n'];
$cep = $_POST['cep'];
$servico_id = $_POST['servico_id'];
$info = $_POST['info'];

if($nome!="" and $telefone!="" and $email!="" and $cpf!="" and $cnpj!="" and $endereco!="" and $n!="" and $cep!="" and $info!="")
{
	alteracliente($conexao, $id, $nome, $telefone, $email, $cpf, $cnpj, $endereco, $n, $cep, $servico_id, $info);
	$_SESSION["success"] = "O cliente foi alterado com sucesso.";
} else {
	$_SESSION["danger"] = "O cliente não foi alterado.";
}

header("Location: cliente-lista.php");

mysqli_close($conexao);

 include("rodape.php"); ?>