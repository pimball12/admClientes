<?php require_once("conecta.php");

function insereagenda($conexao, $cliente_id, $titulo, $data, $hora, $endereco, $detalhes, $usuario_id)
{
	$query = "insert into agenda(cliente_id, titulo, data1, hora, endereco, detalhes, usuario_id) 
	values({$cliente_id},'{$titulo}','{$data}','{$hora}','{$endereco}','{$detalhes}', {$usuario_id})";
	return mysqli_query($conexao,$query);
}


function listaagenda($conexao, $hierarquia, $datacon)
{
	$agendas = array();
	$whereusuario = '';
	if($hierarquia == 0) // usuario comum
	{
		$whereusuario = "and a.usuario_id = '{$_SESSION["usuario_logado"]}'";
	}
	$resultado = mysqli_query($conexao,"select a.*,c.nome as cliente_nome from agenda as a left join clientes as c on a.cliente_id=c.id where 1=1 {$whereusuario} and data1>='{$datacon}' order by data1,hora");
	while($agenda = mysqli_fetch_assoc($resultado))
	{
		array_push($agendas,$agenda);
	}
	return $agendas;
}

function removeagenda($conexao,$id)
{
	$query = "delete from agenda where id = {$id}";
	$resultado = mysqli_query($conexao,$query);
	return mysqli_fetch_assoc($resultado);
}

function alteraagenda($conexao, $id, $titulo, $data, $hora, $endereco, $detalhes)
{
	$query = "update agenda set titulo = '{$titulo}', data1 = '{$data}', hora = '{$hora}', endereco = '{$endereco}', detalhes='{$detalhes}'  where id={$id}";
	return mysqli_query($conexao,$query);
}

function buscaagenda($conexao,$id)
{
	$query =  "select * from agenda	where id = {$id}";
	$resultado = mysqli_query($conexao,$query);
	return mysqli_fetch_assoc($resultado);
}
	
function listaagendacliente($conexao, $hierarquia, $datacon, $id)
{
	$agendas = array();
	$whereusuario = '';
	if($hierarquia == 0) // usuario comum
	{
		$whereusuario = "and a.usuario_id = '{$_SESSION["usuario_logado"]}'";
	}
	$resultado = mysqli_query($conexao,"select a.*,c.nome as cliente_nome from agenda as a left join clientes as c on a.cliente_id=c.id where 1=1 {$whereusuario} and a.data1>='{$datacon}' and a.cliente_id = {$id} order by data1,hora");
	while($agenda = mysqli_fetch_assoc($resultado))
	{
		array_push($agendas,$agenda);
	} 
	return $agendas;
}

function listaagendacomeco($conexao, $hierarquia, $datacon)
{
	$agendas = array();
	$whereusuario = '';
	if($hierarquia == 0) // usuario comum
	{
		$whereusuario = "and a.usuario_id = '{$_SESSION["usuario_logado"]}'";
	}
	$resultado = mysqli_query($conexao,"select a.*,c.nome as cliente_nome from agenda as a left join clientes as c on a.cliente_id=c.id where 1=1 {$whereusuario} and data1='{$datacon}' order by data1,hora");
	while($agenda = mysqli_fetch_assoc($resultado))
	{
		array_push($agendas,$agenda);
	}
	return $agendas;
}