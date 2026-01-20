<?php
include_once("cabec.php");
include_once("config.php");

if (!isset($_GET['codigo'])) {
    die("Código do produto não informado.");
}

$codigo = intval($_GET['codigo']);
$conexao = db_connect();

$sql = "SELECT * FROM produto WHERE proCodigo = :codigo";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
$stmt->execute();

$produto = $stmt->fetch(PDO::FETCH_OBJ);
if (!$produto) {
    die("Produto não encontrado.");
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
    <h2 class="text-center mb-4"><?php echo $lng['produtoCadTitulo']; ?></h2>

    <form action="produtoAtualiza.php" method="POST" class="row g-3 justify-content-center">
        <input type="hidden" name="codigo" value="<?= $produto->proCodigo; ?>">

        <div class="col-md-12">
            <label for="descricao" class="form-label"><?php echo $lng['produtoCadDescricao']; ?></label>
            <input type="text" name="descricao" id="descricao" class="form-control"
                value="<?= htmlspecialchars($produto->proDescricao); ?>" required>
        </div>

        <div class="col-md-6">
            <label for="quantidade" class="form-label"><?php echo $lng['produtoCadQuantidade']; ?></label>
            <input type="number" name="quantidade" id="quantidade" class="form-control"
                value="<?= $produto->proQuantidade; ?>" required>
        </div>

        <div class="col-md-6">
            <label for="setor" class="form-label"><?php echo $lng['produtoCadSetor']; ?></label>
            <input type="text" name="setor" id="setor" class="form-control"
                value="<?= htmlspecialchars($produto->proSetor); ?>" required>
        </div>

        <div class="col-md-6">
            <label for="status" class="form-label"><?php echo $lng['produtoCadStatus']; ?></label>
            <input type="text" name="status" id="status" class="form-control"
                value="<?= htmlspecialchars($produto->proStatus); ?>" required>
        </div>

        <div class="col-md-6">
            <label for="valor" class="form-label"><?php echo $lng['produtoCadValor']; ?></label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control"
                value="<?= $produto->proValor; ?>" required>
        </div>

        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary"><?php echo $lng['produtoCadBotao']; ?></button>
            <a href="produto.php" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>

<?php include_once("rodape.php"); ?>