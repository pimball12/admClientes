<?php require_once("cabecalho.php");?>
<?php require_once("banco-servico.php"); 
require_once("logica-usuario.php");

verificausuario();

$cliente = array("nome" => "", "telefone" => "", "email" => "", "cpf" => "", "cnpj" => "", "endereco" => "", "n" => "", "cep" => "", "servico_id" => "1", "info" => "");
$servicos = listaservicos($conexao);

?>
<h1 align="left"> Cadastrar Clientes </br></h1>
<form action="adiciona-cliente.php" method="post">
	<div class="table-responsive tabela">
	<!--<table class= "table table-hover form-control">-->
		<?php include("cadastro-cliente-formulario-base.php")?>
	<!--</table>-->
    </div>
	<div align="left" class="botao">
	<button  class = "btn btn-primary form-control" type= "submit">Cadastrar</button>
	</div>
</form>

<?php include("rodape.php"); ?>