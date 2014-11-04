<?php require_once("cabecalho.php"); ?>
<?php require_once("banco-usuario.php"); ?>
<?php require_once("logica-usuario.php");
verificausuario();

$pag=$_GET['pag'];

if($pag=="sim")
{
$id = usuariologado();
$usuario = buscausuarioapenas($conexao, $id);
$senh = "nao";
$pag2 = '<input type="hidden" name="pag2" value="sim">';
} else {
verifica_hierarquia($conexao);
$id = $_POST['id'];
$usuario = buscausuarioapenas($conexao, $id);
$senh = 'sim';
$pag2 = '<input type="hidden" name="pag2" value="nao">';
}

$opcoes = array("Usuário Comum","Usuário Administrador");

function seleciona($fora,$dentro)
{
	if($fora == $dentro)
	{
		return "selected";
	} else {
		return ""; }
}

?>
<h1 align="left"> Alterar Usuário </h1>
<form action="altera-usuario.php" method="post">
<input type="hidden" name="id" value="<?=$id?>">
<?=$pag2?>
	<table class="table table-bordered">
		<tr><td><div class="row">
			<div class="col-md-1"> Nome: </div>
			<div class="col-lg-5"><input class="form-control" type="text" name="nome" value="<?=$usuario['nome']?>"></div>
			<div class="col-md-1"> Email: </div>
			<div class="col-lg-5"><input class="form-control" type="email" name="email" value="<?=$usuario['email']?>"></div>
		</div></td></tr>
	<?php if($senh=="sim")
	{ ?>
		<tr><td><div class="row">
			<div class="col-md-1"> Senha: </div>
			<div class="col-lg-5"><a href="trocar-senha-formulario-adm.php?id=<?=$usuario["id"]?>" class = "btn btn-danger form-control" type= "submit">trocar senha</a></div>
			<div class="col-md-1"> Hierarquia: </div>
			<div class="col-lg-5">
				<select name="hierarquia" class = "form-control" selected = <?=$usuario["hierarquia"]?>>
				<?php for($i=0; $i<=1; $i++)
				{ ?>
					<option value="<?=$i?>" <?=seleciona($usuario["hierarquia"],$i)?>> <?=$opcoes[$i]?> </option>
				<?php } ?>
				</select>
			</div>
		</div></td></tr>
	<?php } ?>
	</table>
	<div align="left">
	<button  class = "btn btn-primary" type= "submit">alterar usuário</button>
	</div>
</form>

<?php require_once("cabecalho.php"); ?>