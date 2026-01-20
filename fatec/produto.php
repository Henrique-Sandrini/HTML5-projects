<?php
include_once("cabec.php");

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  $_SESSION['msg_login'] = "⚠️ Faça login para acessar esta página.";
  header("Location: login.php");
  exit();
}

$data = $_REQUEST;
extract($data);

if (isset($pesquisa)) {
  $pesquisa = "%" . $pesquisa . "%";
} else {
  $pesquisa = "%";
}

include_once("config.php");

$conexao = db_connect();

// busca no banco de produtos
$sql = "SELECT proCodigo, proDescricao, proQuantidade, proSetor, proStatus, proValor
        FROM produto
        WHERE proDescricao LIKE :pesquisa
        ORDER BY proDescricao";

$comando = $conexao->prepare($sql);
$comando->bindParam(':pesquisa', $pesquisa);
$comando->execute();
$dados = $comando->fetchAll(PDO::FETCH_OBJ);
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
    max-width: 1000px;
    margin: 60px auto;
    background: rgba(255, 255, 255, 0.85);
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
  }
</style>

<div class="content-container">
  <h3 class="text-center mb-4"><?php echo $lng['produtoTitulo']; ?></h3>

  <form class="row g-3 mb-4" name="pesquisa" action="produto.php" method="GET">
    <div class="col-md-6">
      <label for="pesquisa" class="form-label"><?php echo $lng['produtoPesquisarNome']; ?></label>
      <input type="text" name="pesquisa" id="pesquisa" class="form-control"
        placeholder="<?php echo $lng['produtoPlaceholderNome']; ?>">
    </div>
    <div class="col-md-6 d-flex align-items-end">
      <button type="submit" class="btn btn-primary me-2"><?php echo $lng['produtoBotaoPesquisar']; ?></button>
      <a href="produtoCad.php?op=I" class="btn btn-success"><?php echo $lng['produtoBotaoNovo']; ?></a>
    </div>
  </form>

  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th><?php echo $lng['produtoTabelaDescricao']; ?></th>
          <th><?php echo $lng['produtoTabelaQuantidade']; ?></th>
          <th><?php echo $lng['produtoTabelaSetor']; ?></th>
          <th><?php echo $lng['produtoTabelaStatus']; ?></th>
          <th><?php echo $lng['produtoTabelaValor']; ?></th>
          <th><?php echo $lng['produtoTabelaOpcoes']; ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dados as $linha) { ?>
          <tr>
            <td><?= htmlspecialchars($linha->proDescricao); ?></td>
            <td><?= $linha->proQuantidade; ?></td>
            <td><?= htmlspecialchars($linha->proSetor); ?></td>
            <td><?= htmlspecialchars($linha->proStatus); ?></td>
            <td>R$ <?= number_format($linha->proValor, 2, ',', '.'); ?></td>
            <td>
              <a href="produtoEdita.php?codigo=<?= $linha->proCodigo; ?>" class="btn btn-sm btn-warning">
                <?php echo $lng['produtoTabelaEditar']; ?>
              </a>
              <a href="excluaProduto.php?codigo=<?= $linha->proCodigo; ?>"
                class="btn btn-sm btn-danger"><?php echo $lng['produtoTabelaExcluir']; ?></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php include_once("rodape.php"); ?>