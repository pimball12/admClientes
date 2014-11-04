<?php require_once("cabecalho.php"); ?>
<?php require_once("banco-cliente.php"); ?>
<?php require_once("banco-servico.php")?>
<?php require_once("logica-usuario.php");

verificausuario();

$id = $_GET['id'];
$cliente = buscacliente($conexao, $id);
$servicos = listaservicos($conexao);
?>

<h1 align="left">Alterando Dados do Cliente</h1>
<form action="altera-cliente.php" method="post">
	<input type= "hidden" name = "id" value="<?=$cliente['id']?>">
	<div class = "table-responsive tabela">
		<?php include("cadastro-cliente-formulario-base.php"); ?>
	</div>
	<div align="left" class="botao">
	<button class="btn btn-primary" type="submit">Alterar</button>
	</div>
</form>