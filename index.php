<?php require_once("cabecalho.php");
require_once("logica-usuario.php"); 
require_once("banco-agenda.php");
require_once("banco-usuario.php");
require_once("converte-data.php"); 

if(usuarioestalogado()){
$usuariolog = buscausuarioapenas($conexao,usuariologado()); }
?>

<script type="text/javascript" src="js/js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker-pt-BR.js"></script>
<script type="text/javascript" src="js/js/jquery-ui.js"></script>
<script type="text/javascript" src="js/meuscript.js"></script>
<link rel="stylesheet" type="text/css" href="js/css/smoothness/jquery-ui-style.css" />

<h1> Bem vindo <?=$usuariolog['nome']?></h1>

<?php if(usuarioestalogado()) 
{ ?>

<div align="center">
	<p class="text-success">Você está logado como <?=$usuariolog['email']?></p>
</div>

<h3 align="left">Compromissos do Dia:</h3>
<?php if(listaagendacomeco($conexao,usuario_hierarquia($conexao),date("Y-m-d")))
{ ?>
	<div class ="table-responsive tabela-index">
		<?php $agendas = listaagendacomeco($conexao,usuario_hierarquia($conexao),date("Y-m-d"));
		foreach($agendas as $agenda)
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
<table class="table table-bordered form-control"><tr><td><p align="left"> Não há nenhum compromisso hoje. </p></td></tr></table>
<?php } ?> <?php } else { ?>
	<p style="text-align: center">Por favor, se identificar:</p>
	<form action="login.php" method=post>
	<table class="table">
		<tr>
			<td>Email:</td>
			<td><input class="form-control" type="email" name = "email"></td>
		</tr>
		<tr>
			<td>Senha:</td>
			<td><input class="form-control" type="password" name="senha"></td>
		</tr>
		<tr>
			<td><button class="btn btn-primary">login</button></td>
		</tr>
	</table>
	</form>
<?php } ?>
<?php include("rodape.php")?>

<!-- <div class="container">
	<p class="text-success">Você está logado como <?=$usuariolog['email']?> <a href="logout.php">Deslogar</a></p>
	<div class="row">
		<div class="col-sm-3">
		</div>	
		<div class="col-md-3">
			<button>Olá</button>
		</div>
		<div class="col-md-1">
		</div>		
		<div class="col-md-1">
			<button>Olá</button>
		</div>
	</div>
</div> 



<a href="logout.php">Deslogar</a></p>
-->