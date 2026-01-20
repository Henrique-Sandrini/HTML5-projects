<?php
include_once("cabec.php");
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
    background: rgba(255, 255, 255, 0.85);
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
  }
</style>

<div class="content-container">
  <h2 class="text-center mb-4"><?php echo $lng['produtoCadTitulo']; ?></h2>

  <form action="produtoGrava.php" class="row g-3 justify-content-center" method="POST">
    <div class="col-md-12">
      <label for="descricao" class="form-label"><?php echo $lng['produtoCadDescricao']; ?></label>
      <input type="text" name="descricao" id="descricao" class="form-control"
        placeholder="<?php echo $lng['produtoCadDescricao']; ?>" required>
    </div>

    <div class="col-md-6">
      <label for="quantidade" class="form-label"><?php echo $lng['produtoCadQuantidade']; ?></label>
      <input type="number" name="quantidade" id="quantidade" class="form-control"
        placeholder="<?php echo $lng['produtoCadQuantidade']; ?>" required>
    </div>

    <div class="col-md-6">
      <label for="setor" class="form-label"><?php echo $lng['produtoCadSetor']; ?></label>
      <input type="text" name="setor" id="setor" class="form-control"
        placeholder="<?php echo $lng['produtoCadSetor']; ?>" required>
    </div>

    <div class="col-md-6">
      <label for="status" class="form-label"><?php echo $lng['produtoCadStatus']; ?></label>
      <input type="text" name="status" id="status" class="form-control"
        placeholder="<?php echo $lng['produtoCadStatus']; ?>" required>
    </div>

    <div class="col-md-6">
      <label for="valor" class="form-label"><?php echo $lng['produtoCadValor']; ?></label>
      <input type="number" step="0.01" name="valor" id="valor" class="form-control"
        placeholder="<?php echo $lng['produtoCadValor']; ?>" required>
    </div>

    <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-success"><?php echo $lng['produtoCadBotao']; ?></button>
    </div>
  </form>
</div>

<?php include_once("rodape.php"); ?>