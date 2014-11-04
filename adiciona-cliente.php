<?php require_once("cabecalho.php");
require_once("banco-cliente.php");
require_once("logica-usuario.php");

verificausuario();

$nome =			$_POST['nome'];
$telefone = 	$_POST['telefone'];
$email = 		$_POST['email'];
$cpf = 			$_POST['cpf'];
$cnpj = 		$_POST['cnpj'];
$endereco = 	$_POST['endereco'];
$n = 			$_POST['n'];
$cep = 			$_POST['cep'];
$servico_id = 	$_POST['servico_id'];
$info = 		$_POST['info'];

if($nome!="" and $telefone!="" and $email!="" and $cpf!="" and $cnpj!="" and $endereco!="" and $n!="" and $cep!="" and $info!="")
{	
	inserecliente($conexao, $nome, $telefone, $email, $cpf, $cnpj, $endereco, $n, $cep, $servico_id, $info);
	$_SESSION['success'] = "o cliente '{$nome}' foi registrado.";
} else {
	$_SESSION['danger'] = "o cliente '{$nome}' não foi registrado.";
}
header("Location:cadastro-cliente-formulario.php");

mysqli_close($conexao);

include("rodape.php"); ?>
















<?php /*
if(inserecliente($conexao, $nome, $telefone, $email, $cpf, $cnpj, $endereco, $n, $cep, $servico_id, $info))
{ ?>
	<p class = "alert-success"> O cliente <?= $nome ?>, <?= $cpf ?> foi registrado </p>
<?php } else {
	$msg = mysqli_error($conexao);
?>
	<p class = "alert-danger"> O cliente <?= $nome ?> não foi registrado: <?= $msg?> </p>
<?php }

*/ ?>