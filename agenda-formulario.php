<?php require_once("cabecalho.php");
require_once("banco-cliente.php");
require_once("logica-usuario.php");
/*require_once("agenda-formulario-base");*/

verificausuario();

$agenda = array("titulo" => "", "data" => "", "hora" => "", "endereco" => "", "detalhes" => "");
$data = $agenda['data'];
$id = $_POST['id'];
$pag = $_POST['pag'];
if($pag!="sim")
{
$cliente = buscacliente($conexao,$id);
} else { 
$cliente = listaclientes($conexao);
}
?>

<script type="text/javascript" src="js/js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker-pt-BR.js"></script>
<script type="text/javascript" src="js/js/jquery-ui.js"></script>
<script type="text/javascript" src="js/meuscript.js"></script>
<script type="text/javascript" src="js/Mask.js"></script>
<link rel="stylesheet" type="text/css" href="js/css/smoothness/jquery-ui-style.css" />

<h1 align="left"> Agendar Compromisso </br></h1>
<form action= "agenda.php" method="post" name="form1">
	<table class="table table-bordered form-control" >
		<?php require_once("agenda-formulario-base.php"); ?>
	</table>
	<div align="left">
		<button  class = "btn btn-primary" type= "submit">Agendar</button>
	</div>
</form>
	
<?php require_once("rodape.php"); ?>