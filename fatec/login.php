<?php
include_once("cabec.php");

if (isset($_SESSION['msg_login'])) {
  echo "<p style='color: yellow; font-weight: bold;'>" . $_SESSION['msg_login'] . "</p>";
  unset($_SESSION['msg_login']); // apaga a mensagem depois de mostrar
}
?>

<style>
  body {
    background-image: url('fundo.jpg');
    /* caminho da imagem */
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;

  }

  .login-container .create-account p {
    color: #322436;
    /* ou a cor que você quiser */
  }

  /* Só o CSS do container de login do segundo código */
  .login-container {
    padding: 50px;
    max-width: 400px;
    margin: 40px auto;
    /* centraliza */
    background-color: rgba(248, 249, 250, 0.85);
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(248, 249, 250, 255);
    color: #f8f9fa;
    font-family: 'Montserrat', sans-serif;
  }

  .login-container h2 {
    text-align: center;
    color: #322436;
    margin-bottom: 30px;
  }

  .login-container form label {
    display: block;
    margin-bottom: 5px;
    color: #0d6efd;
    font-weight: 600;
  }

  .login-container form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
  }

  .login-container form button {
    width: 100%;
    background-color: #0d6efd;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    font-size: 1rem;
    transition: background-color 0.3s ease;
  }

  .login-container form button:hover {
    background-color: #0d6efd;
  }

  .login-container .create-account {
    text-align: center;
    margin-top: 15px;
    font-size: 0.9rem;
  }

  .login-container .create-account a {
    color: #8172e0;
    text-decoration: none;
    font-weight: 600;
  }

  .login-container .create-account a:hover {
    text-decoration: underline;
  }
</style>

<div class="login-container">
  <h2><?php echo $lng['loginTitulo']; ?></h2>
  <form name="dados" action="autentica.php" method="POST">
    <label for="email"><?php echo $lng['loginEmail']; ?></label>
    <input type="email" name="email" id="email" required>

    <label for="senha"><?php echo $lng['loginSenha']; ?></label>
    <input type="password" name="senha" id="senha" required>

    <button type="submit" name="btnEnviar"><?php echo $lng['loginEntrar']; ?></button>
  </form>
  <div class="create-account">
    <p><?php echo $lng['loginCriarConta']; ?>
      <a href="cadastro.php"><?php echo $lng['loginCriarContaLink']; ?></a>
    </p>
  </div>
</div>


<?php
include_once("rodape.php");
?>