<?php
$data = $_POST;
extract($data);

include_once("config.php");

$conexao = db_connect();

$sql = "INSERT INTO produto (proDescricao, proQuantidade, proSetor, proStatus, proValor)
        VALUES (:descricao, :quantidade, :setor, :status, :valor)";

$comando = $conexao->prepare($sql);

$comando->bindParam(':descricao', $descricao);
$comando->bindParam(':quantidade', $quantidade);
$comando->bindParam(':setor', $setor);
$comando->bindParam(':status', $status);
$comando->bindParam(':valor', $valor);

$comando->execute();

header('Location: produto.php');
exit;
?>