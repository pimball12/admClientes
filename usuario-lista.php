<?php require_once("cabecalho.php");
require_once("banco-usuario.php");
require_once("logica-usuario.php");
verificausuario();

verifica_hierarquia($conexao);
?>

<div class="row">
    <div class="col-md-6" align="left">
        <h1>Usuários</h1>
    </div>
</div>
<div class="row">
    <div align="right" class="col-md-12">
        <form action="cadastro-usuario-formulario.php" method="post">
        	<button class ="btn btn-primary ">Cadastrar</button>
        </form>
    </div>
</div>


<div class="table-responsive tabela-index">
		<?php $usuarios = listausuario($conexao); ?>
		<?php foreach($usuarios as $usuario) { ?>
        <div class="tabela1-index">
		<div class="row">
        	<div class="col-md-1" align="left"><strong>Nome:</strong></div>
			<div class="col-md-2" align="left"><?= $usuario['nome'] ?> <?php if($usuario['hierarquia']==1) { ?>[administrador] <?php } ?></div>
			<div class="col-md-1" align="left"><strong>Email:</strong></div>
            <div class="col-md-4" align="left"><?= $usuario['email'] ?></div>			
            <div class="col-md-2 visible-lg visible-md">
				<form action="altera-usuario-formulario.php" method="post">
					<input type="hidden" name ="id" value="<?=$usuario['id']?>">
					<button class ="btn btn-primary form-control">alterar</a>
				</form>
			</div>
			<div class="col-md-2 visible-lg visible-md">
				<form action="remove-usuario.php" method="post">
					<input type="hidden" name ="id" value="<?=$usuario['id']?>">
					<input type="hidden" name ="email" value="<?=$usuario['email']?>">
					<button class ="btn btn-danger form-control">remover</a>
				</form>
			</div>
    	</div>
        <div class="row">
            <div class="col-sm-6 col-xs-6 visible-xs visible-sm" align="left">
				<form action="altera-usuario-formulario.php" method="post">
					<input type="hidden" name ="id" value="<?=$usuario['id']?>">
					<button class ="btn btn-primary botao-usuario">alterar</a>
				</form>
			</div>
			<div class="col-sm-6 col-xs-6 visible-xs visible-sm" align="right">
				<form action="remove-usuario.php" method="post">
					<input type="hidden" name ="id" value="<?=$usuario['id']?>">
					<input type="hidden" name ="email" value="<?=$usuario['email']?>">
					<button class ="btn btn-danger botao-usuario">remover</a>
				</form>
			</div>	
        </div>
        </div>
	<?php } ?>
</div>
<?php require_once('rodape.php'); ?>