<?php require_once("cabecalho.php");
require_once("banco-cliente.php");
require_once("banco-agenda.php");
require_once("logica-usuario.php");
require_once("converte-data.php");
require_once("logica-usuario.php");
require_once("converte-data.php");

verificausuario();

$id = $_POST['id'];
$agenda = buscaagenda($conexao,$id);
$cliente = buscacliente($conexao,$agenda['cliente_id']);
$data = convertedataprabarra($agenda['data1']);
?>

<script type="text/javascript" src="js/js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker-pt-BR.js"></script>
<script type="text/javascript" src="js/js/jquery-ui.js"></script>
<script type="text/javascript" src="js/meuscript.js"></script>
<script type="text/javascript" src="js/Mask.js"></script>
<link rel="stylesheet" type="text/css" href="js/css/smoothness/jquery-ui-style.css" />

<h1 align="left">Alterar Compromisso</h1>

<form action= "agenda-update.php" method="post" name="form1">
	<input type= "hidden" name="cliente_id" value="<?=$cliente['id']?>">
	<input type= "hidden" name="id" value="<?=$agenda['id']?>">
	<table class="table table-bordered form-control" >
		<?php require_once("agenda-formulario-base.php"); ?>
	</table>
	<div align="left">
		<button  class = "btn btn-primary" type= "submit" >Alterar</button>
	</div>
</form>

<?php require_once("rodape.php"); ?>