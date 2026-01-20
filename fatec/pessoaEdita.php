<?php
include_once("cabec.php");
include_once("config.php");

if (!isset($_GET['codigo'])) {
    die("Código da pessoa não informado.");
}

$codigo = intval($_GET['codigo']);
$conexao = db_connect();

$sql = "SELECT * FROM pessoa WHERE pesCodigo = :codigo";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
$stmt->execute();

$pessoa = $stmt->fetch(PDO::FETCH_OBJ);
if (!$pessoa) {
    die("Pessoa não encontrada.");
}
?>

<style>
    body {
        background-image: url('fundo.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        font-family: 'Montserrat', sans-serif;
    }

    .content-container {
        max-width: 800px;
        margin: 60px auto;
        background: rgba(255, 255, 255, 0.9);
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }
</style>

<div class="content-container">
    <h2 class="text-center mb-4"><?php echo $lng['pessoaCadTitulo']; ?></h2>

    <form action="pessoaAtualiza.php" method="POST" class="row g-3 justify-content-center">
        <input type="hidden" name="codigo" value="<?= $pessoa->pesCodigo; ?>">

        <div class="col-md-6">
            <label for="nome" class="form-label"><?php echo $lng['pessoaCadNome']; ?></label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= $pessoa->pesNome; ?>" required>
        </div>

        <div class="col-md-6">
            <label for="tipo" class="form-label"><?php echo $lng['pessoaCadTipo']; ?></label>
            <input type="text" id="tipo" name="tipo" list="optipo" class="form-control" value="<?= $pessoa->pesTipo; ?>"
                required>
            <datalist id="optipo">
                <option value="F"><?php echo $lng['pessoaCadFisica']; ?></option>
                <option value="J"><?php echo $lng['pessoaCadJuridica']; ?></option>
            </datalist>
        </div>

        <div class="col-md-6">
            <label for="documento" class="form-label"><?php echo $lng['pessoaCadDocumento']; ?></label>
            <input type="number" name="documento" id="documento" class="form-control"
                value="<?= $pessoa->pesDocumento; ?>" required>
        </div>

        <div class="col-md-6">
            <label for="cliente" class="form-label"><?php echo $lng['pessoaCadCliente']; ?></label>
            <input type="text" name="cliente" id="cliente" class="form-control" value="<?= $pessoa->pesCliente; ?>"
                required>
        </div>

        <div class="col-md-6">
            <label for="fornecedor" class="form-label"><?php echo $lng['pessoaCadFornecedor']; ?></label>
            <input type="text" name="fornecedor" id="fornecedor" class="form-control"
                value="<?= $pessoa->pesFornecedor; ?>" required>
        </div>

        <div class="col-md-6">
            <label for="func" class="form-label"><?php echo $lng['pessoaCadFuncao']; ?></label>
            <input type="text" name="func" id="func" class="form-control" value="<?= $pessoa->pesFunc; ?>" required>
        </div>

        <div class="col-md-6">
            <label for="transp" class="form-label"><?php echo $lng['pessoaCadTransp']; ?></label>
            <input type="text" name="transp" id="transp" class="form-control" value="<?= $pessoa->pesTransp; ?>"
                required>
        </div>

        <div class="col-md-6">
            <label for="cidade" class="form-label"><?php echo $lng['pessoaCadCidade']; ?></label>
            <input type="text" name="cidade" id="cidade" class="form-control" value="<?= $pessoa->pesCidade; ?>"
                required>
        </div>

        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary"><?php echo $lng['pessoaCadBotao']; ?></button>
            <a href="pessoa.php" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>

<?php include_once("rodape.php"); ?>