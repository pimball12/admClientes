<?php require_once("cabecalho.php");
require_once("banco-agenda.php");
require_once("banco-cliente.php");
require_once("converte-data.php");
require_once("logica-usuario.php");
require_once("converte-data.php");
verificausuario();

$id = $_POST['id'];
?>
<script type="text/javascript" src="js/js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker-pt-BR.js"></script>
<script type="text/javascript" src="js/js/jquery-ui.js"></script>
<script type="text/javascript" src="js/meuscript.js"></script>
<link rel="stylesheet" type="text/css" href="js/css/smoothness/jquery-ui-style.css" />

<h1 align="left">Compromissos de <?=buscacliente($conexao,$id)['nome']?></h1>

<div align="left" Class="col-md-10">
<form action="agenda-cliente.php" method ="post">
		<h5 align="left">A partir de:
		<input type="text" name="datainc" id="data" >
		<input type="hidden" name="id" value="<?=$id?>">
		<button class="btn btn-primary" name="mudar" value="mudar">mudar</button></h5> 
</form>
</div>
<div align="right">
	<form action="agenda-formulario.php" method="post">
		<input type="hidden" name ="id" value="<?=$id?>">
		<button class ="btn btn-primary">adicionar compromisso</a>
	</form>
</div>

<?php 
$datainc = convertedatapratraco($_POST['datainc']);
$mudar = $_POST['mudar'];

if($mudar)
{
	$diadehoje = $datainc;
} else {
	$diadehoje = date("Y-m-d");
} ?>
	
	<table class ="table table-hover form-control">
		<?php 
		$agendas = listaagendacliente($conexao,usuario_hierarquia($conexao), $diadehoje, $id);
		foreach($agendas as $agenda)
		{ ?>
			<tr>
				<td><strong>Título</strong><br><?=$agenda['titulo']?><br><br>
				<strong>Cliente</strong><br><?=$agenda['cliente_nome']?></td>
				<td><strong>Data</strong><br><?=convertedataprabarra($agenda['data1'])?><br><br>
				<strong>Detalhes</strong><br><?=$agenda['detalhes']?></td>
				<td><strong>Endereço</strong><br><?=$agenda['endereco']?><br><br>
				<strong>Hora</strong><br><?=$agenda['hora']?></td>
				<td class="control">
					<form action="agenda-altera-formulario.php" method="post">
						<input type="hidden" name ="id" value="<?=$agenda['id']?>">
						<button class ="btn btn-primary form-control">alterar</a>
					</form>
					<form action="remove-agenda.php" method="post">
						<input type="hidden" name ="id" value="<?=$agenda['id']?>">
						<button class ="btn btn-danger form-control">remover</a>
					</form>
				</td class="control">
			</tr>
		<?php }  ?>
	</table>
</div>

<?php include("rodape.php") ?>