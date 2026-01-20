<?php

$data = $_REQUEST;

extract($data);

include_once("config.php");

$conexao = db_connect();

$sql = "insert into pessoa(pesNome, pesTipo, pesDocumento, pesCliente, pesFornecedor, pesFunc, pesTransp, pesCidade) 
			values(:nome, :tipo, :documento, :cliente, :fornecedor, :func, :transp, :cidade) ";

$comando = $conexao->prepare($sql);

$comando->bindParam(':nome', $nome);
$comando->bindParam(':tipo', $tipo);
$comando->bindParam(':documento', $documento);
$comando->bindParam(':cliente', $cliente);
$comando->bindParam(':fornecedor', $fornecedor);
$comando->bindParam(':func', $func);
$comando->bindParam(':transp', $transp);
$comando->bindParam(':cidade', $cidade);

$comando->execute();

header('location: pessoa.php');

?>s