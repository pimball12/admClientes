<?php require_once("cabecalho.php");
require_once("banco-agenda.php");
require_once("converte-data.php");
require_once("logica-usuario.php");
verificausuario()


?>
<script type="text/javascript" src="js/js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker-pt-BR.js"></script>
<script type="text/javascript" src="js/js/jquery-ui.js"></script>
<script type="text/javascript" src="js/meuscript.js"></script>
<link rel="stylesheet" type="text/css" href="js/css/smoothness/jquery-ui-style.css" />
<link rel="stylesheet" type="text/css" href="css/site.css" />

<h1 align="left">Compromissos</h1>

<div class="row">
    <div align="left" class="col-md-2 col-sm-3 visible-sm visible-md visible-lg">
        <h4 align="left">A partir do dia:</h4>
    </div>
    <div align="left" class="col-md-2 col-sm-3 visible-lg visible-md visible-sm">
    	<form action="agenda-lista.php" method ="post">
		<input class="btn bord form-control" type="text" name="datainc" id="data2" value=<?=$diadehoje?> >
	</div>
    <div align="left" class="col-md-2 col-sm-2 visible-lg visible-md visible-sm">
		<button class="btn btn-primary" name="mudar" value="mudar">mudar</button>
        </form>
	</div>
    <div align="right" class="col-md-6 visible-lg visible-md">
        <form action="agenda-formulario.php" method="post">
                <input type="hidden" name ="pag" value="sim">
                <button class ="btn btn-success">adicionar compromisso</a>
        </form>
    </div>
    <div align="right" class="col-sm-4 visible-sm">
        <form action="agenda-formulario.php" method="post">
                <input type="hidden" name ="pag" value="sim">
                <button class ="btn btn-success">adicionar</a>
        </form>
    </div>
</div>
<div class="row">
	<div align="left" class="col-xs-3 visible-xs">
        <h4 align="left">Data:</h4>
    </div>
    <div align="left" class="col-xs-9 visible-xs">
    	<form action="agenda-lista.php" method ="post">
		<input class="btn bord form-control" type="text" name="datainc" id="data" value=<?=$diadehoje?> >
	</div>
</div>
<div class="row">
	<div align="left" class="col-xs-6 visible-xs">
		<button class="btn btn-primary" name="mudar" value="mudar">mudar</button>
        </form>
	</div>
    <div align="right" class="col-xs-6 visible-xs">
        <form action="agenda-formulario.php" method="post">
                <input type="hidden" name ="pag" value="sim">
                <button class ="btn btn-success">adicionar</button>
        </form>
	</div>
</div>
    
<?php 
$mudar = $_POST['mudar'];
$datainc = convertedatapratraco($_POST['datainc']);

if($mudar)
{
	$diadehoje = $datainc;
} else {
	$diadehoje = date("Y-m-d");
} ?>

<?php if(listaagenda($conexao,usuario_hierarquia($conexao), $diadehoje)) { ?>
<div class ="table-responsive tabela-index">
<?php $agendas = listaagenda($conexao,usuario_hierarquia($conexao), $diadehoje); ?>
<?php foreach($agendas as $agenda)
{ ?>
	<div class="tabela1-index">    
        <div class="row">
       	<div class="col-md-3" align="left">
			<div class="row box-index "><strong>Título</strong><br><?=$agenda['titulo']?></div>
            <div class="row box-index "><strong>Cliente</strong><br><?=$agenda['cliente_nome']?></div>
		</div>
        <div class="col-md-3" align="left">
        	<div class="row box-index"><strong>Data</strong><br><?=convertedataprabarra($agenda['data1'])?></div>
            <div class="row box-index"><strong>Detalhes</strong><br><?=$agenda['detalhes']?></div>
        </div>
        <div class="col-md-4" align="left">
        	<div class="row box-index" ><strong>Endereço</strong><br><?=$agenda['endereco']?></div>
        	<div class="row box-index" ><strong>Hora</strong><br><?=$agenda['hora']?></div>
        </div>
        <div class="col-md-2 botao-index visible-lg visible-md" align="right">
				<div class="row botao1-index">
					<form action="agenda-altera-formulario.php" method="post">
						<input type="hidden" name ="id" value="<?=$agenda['id']?>">
						<button class ="btn btn-primary form-control">alterar</a>
					</form>
				</div>
				<div class="row botao2-index">
					<form action="remove-agenda.php" method="post">
						<input type="hidden" name ="id" value="<?=$agenda['id']?>">
						<button class ="btn btn-danger form-control">remover</a>
					</form>
				</div>
        </div>
		<div class="col-md-1 botao-index visible-xs visible-sm" align="center">
				<div class="row botao1-index">
					<form action="agenda-altera-formulario.php" method="post">
						<input type="hidden" name ="id" value="<?=$agenda['id']?>">
						<button class ="btn btn-primary form-control">alterar</a>
					</form>
				</div>
				<div class="row botao2-index ">
					<form action="remove-agenda.php" method="post">
						<input type="hidden" name ="id" value="<?=$agenda['id']?>">
						<button class ="btn btn-danger form-control">remover</a>
					</form>
				</div>
        </div>
        </div>
        </div>
	<?php } ?>
</div>
<?php } else { ?>
<table class="table table-bordered form-control"><tr><td><p align="left"> Não há nenhum compromisso a partir desta data. </p></td></tr></table>
<?php } ?>


<?php include("rodape.php") ?>