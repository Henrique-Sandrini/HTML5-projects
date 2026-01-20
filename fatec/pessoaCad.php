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
  <h2 class="text-center mb-4"><?php echo $lng['pessoaCadTitulo']; ?></h2>

  <form action="pessoaGrava.php" class="row g-3 justify-content-center">
    <div class="col-md-6">
      <label for="nome" class="form-label"><?php echo $lng['pessoaCadNome']; ?></label>
      <input type="text" name="nome" id="nome" class="form-control"
        placeholder="<?php echo $lng['pessoaPlaceholderNome']; ?>" required>
    </div>

    <div class="col-md-6">
      <label for="tipo" class="form-label"><?php echo $lng['pessoaCadTipo']; ?></label>
      <input type="text" id="tipo" name="tipo" list="optipo" class="form-control"
        placeholder="<?php echo $lng['pessoaCadTipo']; ?>" required>
      <datalist id="optipo">
        <option value="F"><?php echo $lng['pessoaCadFisica']; ?></option>
        <option value="J"><?php echo $lng['pessoaCadJuridica']; ?></option>
      </datalist>
    </div>

    <div class="col-md-6">
      <label for="documento" class="form-label"><?php echo $lng['pessoaCadDocumento']; ?></label>
      <input type="number" name="documento" id="documento" class="form-control"
        placeholder="<?php echo $lng['pessoaCadDocumento']; ?>" required>
    </div>

    <div class="col-md-6">
      <label for="cliente" class="form-label"><?php echo $lng['pessoaCadCliente']; ?></label>
      <input type="text" name="cliente" id="cliente" class="form-control"
        placeholder="<?php echo $lng['pessoaCadCliente']; ?>" required>
    </div>

    <div class="col-md-6">
      <label for="fornecedor" class="form-label"><?php echo $lng['pessoaCadFornecedor']; ?></label>
      <input type="text" name="fornecedor" id="fornecedor" class="form-control"
        placeholder="<?php echo $lng['pessoaCadFornecedor']; ?>" required>
    </div>

    <div class="col-md-6">
      <label for="func" class="form-label"><?php echo $lng['pessoaCadFuncao']; ?></label>
      <input type="text" name="func" id="func" class="form-control" placeholder="<?php echo $lng['pessoaCadFuncao']; ?>"
        required>
    </div>

    <div class="col-md-6">
      <label for="transp" class="form-label"><?php echo $lng['pessoaCadTransp']; ?></label>
      <input type="text" name="transp" id="transp" class="form-control"
        placeholder="<?php echo $lng['pessoaCadTransp']; ?>" required>
    </div>

    <div class="col-md-6">
      <label for="cidade" class="form-label"><?php echo $lng['pessoaCadCidade']; ?></label>
      <input type="text" name="cidade" id="cidade" class="form-control"
        placeholder="<?php echo $lng['pessoaCadCidade']; ?>" required>
    </div>

    <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-success"><?php echo $lng['pessoaCadBotao']; ?></button>
    </div>
  </form>
</div>

<?php include_once("rodape.php"); ?>