<?php
include_once("config.php");
include_once("cabec.php");
if (isset($_GET['codigo'])) {
    $id = $_GET['codigo'];

    $conexao = db_connect();

    $sql = "SELECT * FROM pessoa WHERE pesCodigo = :codigo";
    $comando = $conexao->prepare($sql);
    $comando->bindParam(':codigo', $pesCodigo, PDO::PARAM_INT);
    $comando->execute();

    $pessoa = $comando->fetch(PDO::FETCH_OBJ);

    if (!$pessoa) {
        echo "Registro não encontrado.";
        exit();
    }
} else {
    echo "ID não informado.";
    exit();
}
?>

<?
