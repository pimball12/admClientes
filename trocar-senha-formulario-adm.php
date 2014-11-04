<?php require_once("cabecalho.php");
require_once("logica-usuario.php");
require_once("banco-usuario.php");

verifica_hierarquia($conexao);

$id = $_GET['id'];
$usuario = buscausuarioapenas($conexao, $id);
?>

<h1 align="left">Alterar Senha de: <?=$usuario['nome']?><h2>

<form action="trocar-senha.php" method="post">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="adm" value="sim">
	<table class="table form-control">
		<tr>
			<td>Nova Senha:<td>
			<td><input class="form-control" type="password" name="senha1"></td>
		</tr>
		<tr>
			<td> Repetir Nova Senha:<td>
			<td><input class="form-control" type="password" name="senha2"></td>
		</tr>
	</table>
	<div align="left">
	<button class="btn btn-primary" type="submit"> trocar senha </button>
	</div>
	</form>
</table>

<?php require_once("cabecalho.php"); ?>