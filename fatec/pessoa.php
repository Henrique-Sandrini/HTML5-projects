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

$sql = "SELECT pesCodigo, pesNome, pesTipo, pesDocumento, 
               pesCliente, pesFornecedor, pesFunc,
               pesCidade, pesTransp
        FROM pessoa
        WHERE pesNome LIKE :pesquisa
        ORDER BY pesNome";

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
  <h3 class="text-center mb-4"><?php echo $lng['pessoaTitulo']; ?></h3>

  <form class="row g-3 mb-4" name="pesquisa" action="pessoa.php" method="GET">
    <div class="col-md-6">
      <label for="pesquisa" class="form-label"><?php echo $lng['pessoaPesquisarNome']; ?></label>
      <input type="text" name="pesquisa" id="pesquisa" class="form-control"
        placeholder="<?php echo $lng['pessoaPlaceholderNome']; ?>">
    </div>
    <div class="col-md-6 d-flex align-items-end">
      <button type="submit" class="btn btn-primary me-2"><?php echo $lng['pessoaBotaoPesquisar']; ?></button>
      <a href="pessoaCad.php?op=I" class="btn btn-success"><?php echo $lng['pessoaBotaoNovo']; ?></a>
    </div>
  </form>

  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th><?php echo $lng['pessoaTabelaNome']; ?></th>
          <th><?php echo $lng['pessoaTabelaDocumento']; ?></th>
          <th><?php echo $lng['pessoaTabelaTipo']; ?></th>
          <th><?php echo $lng['pessoaTabelaCliente']; ?></th>
          <th><?php echo $lng['pessoaTabelaFornecedor']; ?></th>
          <th><?php echo $lng['pessoaTabelaFuncao']; ?></th>
          <th><?php echo $lng['pessoaTabelaTransp']; ?></th>
          <th><?php echo $lng['pessoaTabelaCidade']; ?></th>
          <th><?php echo $lng['pessoaTabelaOpcoes']; ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dados as $linha) { ?>
          <tr>
            <td><?= htmlspecialchars($linha->pesNome); ?></td>
            <td><?= $linha->pesDocumento; ?></td>
            <td><?= ($linha->pesTipo == 'F') ? $lng['pessoaCadFisica'] : $lng['pessoaCadJuridica']; ?></td>
            <td><?= $linha->pesCliente; ?></td>
            <td><?= $linha->pesFornecedor; ?></td>
            <td><?= $linha->pesFunc; ?></td>
            <td><?= $linha->pesTransp; ?></td>
            <td><?= htmlspecialchars($linha->pesCidade); ?></td>
            <td>
              <a href="pessoaEdita.php?codigo=<?= $linha->pesCodigo; ?>" class="btn btn-sm btn-warning">
                <?php echo $lng['pessoaTabelaEditar']; ?>
              </a>
              <a href="exclua.php?codigo=<?= $linha->pesCodigo; ?>"
                class="btn btn-sm btn-danger"><?php echo $lng['pessoaTabelaExcluir']; ?></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php include_once("rodape.php"); ?>