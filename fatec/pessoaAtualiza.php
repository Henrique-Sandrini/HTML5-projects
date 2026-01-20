<?php
include_once("config.php");

$data = $_POST;
extract($data);

$conexao = db_connect();

$sql = "UPDATE pessoa 
        SET pesNome = :nome, 
            pesTipo = :tipo, 
            pesDocumento = :documento, 
            pesCliente = :cliente, 
            pesFornecedor = :fornecedor,
            pesFunc = :func,
            pesCidade = :cidade,
            pesTransp = :transp
        WHERE pesCodigo = :codigo";

$stmt = $conexao->prepare($sql);

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':tipo', $tipo);
$stmt->bindParam(':documento', $documento);
$stmt->bindParam(':cliente', $cliente);
$stmt->bindParam(':fornecedor', $fornecedor);
$stmt->bindParam(':func', $func);
$stmt->bindParam(':cidade', $cidade);
$stmt->bindParam(':transp', $transp);
$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);

if ($stmt->execute()) {
    header("Location: pessoa.php?msg=atualizada");
    exit;
} else {
    echo "Erro ao atualizar dados.";
}
?>