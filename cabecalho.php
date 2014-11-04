<?php require_once("mostra-alerta.php");
error_reporting(E_ALL ^ E_NOTICE);
require_once("logica-usuario.php");?>
<html>
<head>
	<title>Meu Site</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/site.css" rel="stylesheet" />
	<script type="text/javascript" src="js/js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>


<body class="bg-default" > <!--style="background-color:#ADD8E6"-->
	<div class="navbar navbar-default navbar-fixed-top" > <!--style="background-color:#87CEEB"-->
		<div class="container" >
			<a class="navbar-brand" href="index.php">Inicio</a>
            
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
            	<span class="icon-bar"></span>
            </button>
            <?php if(usuarioestalogado()){ ?>
			<div class="collapse navbar-collapse navHeaderCollapse">            
				<ul class="nav navbar-nav navbar">
					<li><a href="cliente-lista.php">Clientes</a></li>
					<li><a href="agenda-lista.php">Compromissos</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right active">
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=usuario_nome($conexao)?><b class="caret"></b></a>
					  <ul class="dropdown-menu" role="menu">
						<li><a href="altera-usuario-formulario.php?pag=sim">Alterar Conta</a></li>
						<li><a href="trocar-senha-formulario.php">Mudar Senha</a></li>
						<li><a href="manda-email.php?pag=sim">Mandar Email</a></li>
						<?php if(usuario_hierarquia($conexao)==1){ ?>
							<li class="divider"></li>
							<li><a href="usuario-lista.php">Usuarios</a></li>
						<?php } ?>
						<li class="divider"></li>
						<li><a href="logout.php">Deslogar</a></li>
					  </ul>
					</li>
				 </ul>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="container" >
        <div class="principal" >
			<?php mostraalerta("success"); ?>
			<?php mostraalerta("danger"); ?>
			
			
			
<?php /*
	<div class ="container">
		<div class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
		</div>
	</div>
*/ ?>
