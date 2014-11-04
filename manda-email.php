<?php require_once("cabecalho.php");
require_once("logica-usuario.php");
require_once("banco-cliente.php");
require_once("logica-usuario.php");

verificausuario();

$pag = $_GET['pag'];
$id = $_POST['id']; 

if($pag=='sim')
{	
	$msg = '<input type= "hidden" name="pag2" value="sim">';
	$cod='';
	$vari = '';
} else {
	$msg = "";
	$cod='readonly';
	$cliente = buscacliente($conexao,$id);
	$vari = $cliente['email'];
}
?>

<h1 align="left">Mandar Email</h1>
<form action="email.php" method="post">
	<input type= "hidden" name="id" value="<?=$cliente['id']?>">
	<?=$msg?>
	<table class= "table table-bordered form-control">
		<tr>
			<td>De:</td>
			<td><input class ="form-control" type="text" name="de" value="<?=usuario_email($conexao)?>"></td>
		</tr>
		<tr>
			<td>Para:</td>
			<td><input class = "form-control" type="text" name="para" value="<?=$cliente['email']?>" <?=$cod?>></td>
		</tr>
		<tr>
			<td>Nome:</td>
			<td><input class = "form-control texto" type="text" name = "nome" value = "<?=usuario_nome($conexao)?>"></td>
		</tr>
		<tr>
			<td>Assunto:</td>
			<td><input class = "form-control" type="text" name = "assunto"></td>
		</tr>
		<tr>
			<td>Mensagem:</td>
			<td><textarea class = "form-control" type = "text" name = "mensagem"/></textarea></td>
		</tr>
	</table>
	<div align="left">
	<button  class = "btn btn-primary" type= "submit">Enviar</button>
	</div>
</form>