<?php
include_once("config.php");

$data = $_POST;
extract($data);

$conexao = db_connect();

$sql = "UPDATE produto 
        SET proDescricao = :descricao, 
            proQuantidade = :quantidade, 
            proSetor = :setor, 
            proStatus = :status, 
            proValor = :valor
        WHERE proCodigo = :codigo";

$stmt = $conexao->prepare($sql);

$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':quantidade', $quantidade);
$stmt->bindParam(':setor', $setor);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':valor', $valor);
$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);

if ($stmt->execute()) {
    header("Location: produto.php?msg=atualizado");
    exit;
} else {
    echo "Erro ao atualizar produto.";
}
?>