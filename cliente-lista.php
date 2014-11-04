<?php require_once("cabecalho.php");
require_once("banco-cliente.php");
require_once("banco-agenda.php");
require_once("logica-usuario.php");
require_once("converte-data.php");

$clientesl = listaclientes($conexao);

function seleciona($dentro,$postado)
{
	if($dentro == $_POST[$postado])
	{
		return "selected";
	} else {
		return "";
	}
}

?>
<script type="text/javascript" src="js/js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker-pt-BR.js"></script>
<script type="text/javascript" src="js/js/jquery-ui.js"></script>
<script type="text/javascript" src="js/meuscript.js"></script>
<link rel="stylesheet" type="text/css" href="js/css/smoothness/jquery-ui-style.css" />

<h1 style="text-align:left">Clientes</h1>

<form action="cliente-lista.php" method="post">

<div class="row">
<div class="col-md-2 col-sm-3 col-xs-5 caixae-clientes">
    <select name="escolhido" class="form-control">
    	<option type="hidden" value='' ></option>
		<?php foreach($clientesl as $clientel)
        { ?>
			<option  value="<?=$clientel['id']?>" <?=seleciona($clientel['id'],escolhido)?>> <?= substr($clientel['nome'],0,20) ?> - <?= $clientel['id']?> </option>
        <?php } ?>
    </select>
</div>
<div class="col-md-4 col-xs-2 col-sm-3" align="left">
    <button  class = "btn btn-primary" type= "submit">Ir</button>
</div>
</form>

<div class="col-md-6 col-sm-6 col-xs-6 visible-lg visible-md visible-sm" align="right">
	<form action="cadastro-cliente-formulario.php">
	<button class="btn btn-success" type="submit"> cadastrar </button>
    </form>
</div>

<div class="col-md-6 col-sm-6 col-xs-5 visible-xs" align="right">
	<form action="cadastro-cliente-formulario.php">
	<button class="btn btn-success" type="submit"> novo </button>
	</form>
</div>

</div>

<?php
if($escolhido = $_POST['escolhido'])
{
$cliente =  buscacliente($conexao,$escolhido);
?>


<div class="table-responsive tabela" id="tabela-cli">
    <div class="row tabela1" align="left">
        <div class="col-md-1"><strong>Nome:</strong></div>
        <div class="col-md-2"><?= $cliente['nome'] ?></div>
        <div class="col-md-1"><strong>Telefone:</strong></div>
        <div class="col-md-2"><?= $cliente['telefone'] ?></div>
        <div class="col-md-1"><strong>CPF:</strong></div>
        <div class="col-md-2"><?= $cliente['cpf'] ?></div>
        <div class="col-md-1"><strong>CNPJ:</strong></div>
        <div class="col-md-2"><?= $cliente['cnpj'] ?></div>
    </div>
    <div class="row tabela1 tab" align="left">
        <div class="col-md-1"><strong>Email:</strong></div>
        <div class="col-md-2"><?= $cliente['email'] ?></div>
        <div class="col-md-1"><strong>Info:</strong></div>
        <div class="col-md-5"><?= $cliente['info'] ?></div>
        <div class="col-md-1"><strong>Req. de Serviço:</strong></div>
        <div class="col-md-2"><?= $cliente['servico_nome'] ?></div>
    </div>
    <div class="row tabela1 tab" align="left">
        <div class="col-md-1"><strong>Cep:</strong></div>
        <div class="col-md-2"><?= $cliente['cep'] ?></div>
    	<div class="col-md-1"><strong>Endereco:</strong></div>
        <div class="col-md-5"><?= $cliente['endereco'] ?></div>
        <div class="col-md-1"><strong>Número:</strong></div>
        <div class="col-md-2"><?= $cliente['n'] ?></div>
	</div>
	<div class="row tab tab2">
    	<div class="col-md-8" align="right">
        <a class="btn btn-primary botao-clientes" id="botao-espaco"
        href="cliente-altera-formulario.php?id=<?=$cliente['id']?>">alterar</a>
        </div>
        <div class="col-md-2" align="right">
        <form action="remove-cliente.php" method="post">
            <input type="hidden" name ="id" value="<?=$cliente['id']?>">
            <button class ="btn btn-danger botao-clientes">remover</button>
        </form>
		</div>
        <div class="col-md-2" align="right">
        <form action="manda-email.php" method="post">
            <input type="hidden" name ="id" value="<?=$cliente['id']?>">
            <button class ="btn btn-info botao-clientes">mandar email</button>
        </form>
        </div>
</div>
</div>

<br />

<h2 align="left">Compromissos de <?=$cliente['nome']?>:</h2>

<div class="row">
    <div align="left" class="col-md-2 col-sm-3 visible-sm visible-md visible-lg" >
        	<h4 align="left">A partir do dia:</h4>
	</div>
    <div align="left" class="col-md-2 col-sm-3 visible-lg visible-md visible-sm" >
    	<form action="cliente-lista.php" method ="post">
            <input class="btn bord form-control" type="text" name="datainc" id="data2" >
            <input type="hidden" name="escolhido" value="<?=$escolhido?>" >
    </div>
    <div align="left" class="col-md-2 col-sm-2 visible-lg visible-md visible-sm">
    		<button class="btn btn-primary " name="mudar" value="mudar">mudar</button>
        </form>
    </div>
	<div align="right" class="col-md-6 visible-lg visible-md">
        <form action="agenda-formulario.php" method="post">
            <input type="hidden" name ="id" value="<?=$escolhido?>">
            <button class ="btn btn-success">adicionar compromisso</a>
        </form>
    </div>
    <div align="right" class="col-sm-4 visible-sm">
        <form action="agenda-formulario.php" method="post">
            <input type="hidden" name ="id" value="<?=$escolhido?>">
            <button class ="btn btn-success">adicionar</a>
        </form>
    </div>
</div>
<div class="row">
	<div align="left" class="col-xs-3 visible-xs">
        <h4 align="left">Data:</h4>
    </div>
    <div align="left" class="col-xs-9 visible-xs">
    	<form action="cliente-lista.php" method ="post">
            <input class="btn bord form-control" type="text" name="datainc" id="data" >
            <input type="hidden" name="escolhido" value="<?=$escolhido?>" >
	</div>
</div>
<div class="row">
	<div align="left" class="col-xs-6 visible-xs">
			<button class="btn btn-primary tab3" name="mudar" value="mudar">mudar</button>
        </form>
	</div>
    <div align="right" class="col-xs-6 visible-xs">
		<form action="agenda-formulario.php" method="post">
            <input type="hidden" name ="id" value="<?=$escolhido?>">
            <button class ="btn btn-success">adicionar</a>
        </form>
	</div>
</div>


<?php

if($datainc = ($_POST['datainc']))
{
	$diadehoje = convertedatapratraco($datainc);
} else {
	$diadehoje = date("Y-m-d");
}

if(listaagendacliente($conexao,usuario_hierarquia($conexao), $diadehoje, $escolhido)){
	
$agendas = listaagendacliente($conexao,usuario_hierarquia($conexao), $diadehoje, $escolhido);?>
<div class ="table-responsive tabela-clientes"><?php
foreach($agendas as $agenda)
{ ?>
        <div class="">
        
        <div class="row tabela-cliente1">
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
<table class="table table-bordered form-control"><tr><td><p align="left"> Não há nenhum compromisso com <?=$cliente['nome']?> a partir desta data. </p></td></tr></table>
<?php } } ?>

<?php include("rodape.php"); ?>