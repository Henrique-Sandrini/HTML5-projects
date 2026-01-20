<?php
include_once("cabec.php");
?>

<style>
  body {
    background-image: url('fundo.jpg');
    /* sua imagem */
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
    font-family: 'Montserrat', sans-serif;
  }

  .content-container {
    max-width: 800px;
    margin: 100px auto;
    /* centraliza vertical e horizontal */
    background: rgba(255, 255, 255, 0.85);
    /* branco transparente */
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    text-align: center;
  }

  .content-container h2 {
    margin-bottom: 20px;
    color: #333;
  }

  .content-container p {
    color: #555;
    font-size: 1.1rem;
    line-height: 1.6;
  }

  .content-container .user-info {
    font-weight: bold;
    margin-bottom: 20px;
    font-size: 1.2rem;
    color: #0d6efd;
  }
</style>

<div class="content-container">
  <div class="user-info">
    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      printf($lng['bemVindoUsuario'], htmlspecialchars($_SESSION['usuNome']));
    } else {
      echo $lng['usuarioDesconectado'];
    }
    ?>
  </div>

  <h2><?php echo $lng['tituloProjeto']; ?></h2>
  <p><?php echo $lng['descricaoProjeto']; ?></p>
</div>

<?php
include_once("rodape.php");
?>