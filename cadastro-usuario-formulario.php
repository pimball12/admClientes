<?php require_once("cabecalho.php");
require_once("banco-usuario.php"); 
require_once("logica-usuario.php");

verifica_hierarquia($conexao);?>

<h1 align="left">Cadastrar Novo Usuário</h1><br>
<form action="cadastro-usuario.php" method="post">
	<table class="table table-bordered">
		<tr><td><div class="row">
			<div class="col-md-1"> Nome: </div>
			<div class="col-lg-5"><input class="form-control" type="text" name="nome"></div>
			<div class="col-md-1"> Email: </div>
			<div class="col-lg-5"><input class="form-control" type="email" name="email"></div>
		</div></td></tr>
		<tr><td><div class="row">
			<div class="col-md-1"> Senha: </div>
			<div class="col-lg-5"><input class="form-control" type="password" name="senha"></div>
			<div class="col-md-1"> Hierarquia: </div>
			<div class="col-lg-5">
				<select name="hierarquia" class = "form-control">
					<option value="0">Usuário Comum</option>
					<option value="1">Usuário Administrador</option>
				</select>
			</div>
		</div></td></tr>
	</table>
	<div align="left">
	<button  class = "btn btn-primary" type= "submit">Cadastrar</button>
	</div>
</form>

<?php require_once("cabecalho.php"); ?>