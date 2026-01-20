<?php
include_once("cabec.php");

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  $_SESSION['msg_login'] = "⚠️ Faça login para acessar esta página.";
  header("Location: login.php");
  exit();
}
?>

<style>
  body {
    background-image: url('fundo.jpg');
    /* mantém a mesma imagem de fundo */
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
    font-family: 'Montserrat', sans-serif;
  }

  .content-container {
    max-width: 800px;
    margin: 100px auto;
    background: rgba(255, 255, 255, 0.85);
    /* branco com transparência */
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
    margin-bottom: 20px;
  }

  .content-container .date {
    margin-top: 15px;
    font-weight: bold;
    color: #0d6efd;
    font-size: 1rem;
  }
</style>

<div class="content-container">
  <h2><?php echo $lng['sobreTitulo']; ?></h2>
  <p>
    <?php echo $lng['sobreDescricao']; ?>
  </p>

  <div class="date">
    <?php echo date("d/m/Y"); ?>
  </div>
</div>


<?php
include_once("rodape.php");
?>