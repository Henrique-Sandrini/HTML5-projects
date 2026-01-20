<?php
include_once("config.php");

if (isset($_GET['codigo'])) {
    $id = $_GET['codigo'];

    $conexao = db_connect();

    $sql = "DELETE FROM produto WHERE proCodigo = :codigo";

    $comando = $conexao->prepare($sql);
    $comando->bindParam(':codigo', $id, PDO::PARAM_INT);

    if ($comando->execute()) {
        header("Location: produto.php?msg=excluido");
        exit();
    } else {
        echo "Erro ao excluir o registro.";
    }
} else {
    echo "ID não informado.";
}
?>