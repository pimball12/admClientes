<?php
require_once("conecta.php"); 

function listaclientes($conexao) 
{
	$clientes = array();
	$resultado = mysqli_query($conexao, "select c.*,s.nome as servico_nome from clientes as c left join servicos as s on c.servico_id=s.id order by c.nome");
	while($cliente = mysqli_fetch_assoc($resultado))
	{
		array_push($clientes,$cliente);
	}
	return $clientes;
}

function listacliente($conexao,$pesq) 
{
	$clientes = array();
	if($pesq!="")
	{
		$quer = "where c.nome like '%{$pesq}%'";
	} else { $quer = ""; }
	$resultado = mysqli_query($conexao, "select c.*,s.nome as servico_nome from clientes as c left join servicos as s on c.servico_id=s.id {$quer} order by c.nome");
	while($cliente = mysqli_fetch_assoc($resultado))
	{
		array_push($clientes,$cliente);
	}
	return $clientes;
}

function inserecliente($conexao, $nome, $telefone, $email, $cpf, $cnpj, $endereco, $n, $cep, $servico_id, $info)
{
	$query = "insert into clientes(nome,telefone,email,cpf,cnpj,endereco,n,cep,servico_id,info) 
	values('{$nome}','{$telefone}','{$email}','{$cpf}','{$cnpj}','{$endereco}','{$n}','{$cep}',{$servico_id},'{$info}')";
	return mysqli_query($conexao,$query);
}

function alteracliente($conexao, $id, $nome, $telefone, $email, $cpf, $cnpj, $endereco, $n, $cep, $servico_id, $info)
{
	$query = "update clientes set nome ='{$nome}', telefone = '{$telefone}', email = '{$email}', cpf = '{$cpf}', cnpj = '{$cnpj}', endereco ='{$endereco}', n='{$n}', cep='{$cep}', servico_id={$servico_id}, info='{$info}'  where id = '{$id}'";
	return mysqli_query($conexao, $query);
}

function removecliente($conexao,$id)
{
	$query = "delete from clientes where id = {$id}";
	$resultado =  mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}
	
function buscacliente($conexao,$id)
{
	$query =  "select c.*,s.nome as servico_nome from clientes as c left join servicos as s on c.servico_id=s.id where c.id = {$id}";
	$resultado = mysqli_query($conexao,$query);
	return mysqli_fetch_assoc($resultado);
}

?>