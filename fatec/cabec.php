<!doctype html>
<?php
session_start();

// idioma padrão (português)
$idioma = $_SESSION['idioma'] ?? 'pt_BR';

// caminho do arquivo de idioma
$arquivoLang = __DIR__ . "/lang/{$idioma}.lang";

// carrega arquivo de idioma
if (file_exists($arquivoLang)) {
  $lng = parse_ini_file($arquivoLang);
} else {
  $lng = parse_ini_file(__DIR__ . "/lang/pt_BR.lang");
}
?>
<html lang="<?php echo substr($idioma, 0, 2); ?>">

<head>
  <link rel="icon" href="queleto.gif">
  <style>
    body {
      background-image: url('fundo.jpg');
      /* caminho da imagem */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
    }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>FATEC Americana</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">FATEC</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="."><?php echo $lng['sistema']; ?></a>
          </li>

          <!-- Dropdown Cadastro -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $lng['cadastro']; ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="pessoa.php"><?php echo $lng['pessoa']; ?></a></li>
              <li><a class="dropdown-item" href="produto.php"><?php echo $lng['produto']; ?></a></li>
              <li><a class="dropdown-item" href="cadastro.php"><?php echo $lng['usuario']; ?></a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="login.php"><?php echo $lng['acessoSistema']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="sobre.php"><?php echo $lng['sobreSistema']; ?></a>
          </li>
        </ul>

        <!-- bandeira do idioma -->
        <div>
          <a href="idioma.php"><img src="./icones/<?php echo substr($idioma, 0, 2); ?>.png" width="40px"></a>
        </div>

        <?php if (isset($_SESSION['logged_in'])): ?>
          <div class="d-flex ms-2">
            <a class="btn btn-dark" href="desconectar.php"><?php echo $lng['sair']; ?></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>