<?php
require_once("conecta.php");
function listaservicos($conexao)
{
	$servicos = array();
	$query = "select * from servicos";
	$resultado = mysqli_query($conexao, $query);
	while($servico = mysqli_fetch_assoc($resultado))
	{
		array_push($servicos, $servico);
	}
	return $servicos;
}