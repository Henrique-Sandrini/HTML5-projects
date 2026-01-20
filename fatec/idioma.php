<?php include_once("cabec.php"); ?>

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
    background: rgba(255, 255, 255, 0.9);
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    text-align: center;
  }

  .language-card {
    transition: transform 0.2s, box-shadow 0.2s;
    border-radius: 12px;
  }

  .language-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
  }

  .language-card img {
    max-width: 80px;
    transition: transform 0.2s;
  }

  .language-card img:hover {
    transform: scale(1.1);
  }
</style>

<div class="content-container">
  <h2 class="mb-4"><?php echo $lng['selecioneIdioma']; ?></h2>

  <div class="row justify-content-center g-4">
    <!-- Português -->
    <div class="col-sm-6 col-md-4">
      <div class="card language-card h-100">
        <div class="card-body text-center">
          <h5 class="card-title"><?php echo $lng['portugues']; ?></h5>
          <p class="text-muted">Brasil</p>
          <a href="idiomaSeleciona.php?idioma=pt">
            <img src="./icones/pt.png" alt="Português">
          </a>
        </div>
        <div class="card-footer text-center">
          <small class="text-muted">pt</small>
        </div>
      </div>
    </div>

    <!-- Inglês -->
    <div class="col-sm-6 col-md-4">
      <div class="card language-card h-100">
        <div class="card-body text-center">
          <h5 class="card-title"><?php echo $lng['ingles']; ?></h5>
          <p class="text-muted">EUA</p>
          <a href="idiomaSeleciona.php?idioma=en_US">
            <img src="./icones/en.png" alt="English">
          </a>
        </div>
        <div class="card-footer text-center">
          <small class="text-muted">en</small>
        </div>
      </div>
    </div>

    <!-- Espanhol -->
    <div class="col-sm-6 col-md-4">
      <div class="card language-card h-100">
        <div class="card-body text-center">
          <h5 class="card-title"><?php echo $lng['espanhol']; ?></h5>
          <p class="text-muted">Espanha</p>
          <a href="idiomaSeleciona.php?idioma=es">
            <img src="./icones/es.png" alt="Español">
          </a>
        </div>
        <div class="card-footer text-center">
          <small class="text-muted">es</small>
        </div>
      </div>
    </div>
  <!-- Alemao -->
  <div class="col-sm-6 col-md-4">
      <div class="card language-card h-100">
        <div class="card-body text-center">
          <h5 class="card-title"><?php echo $lng['alemao']; ?></h5>
          <p class="text-muted">Alemanha</p>
          <a href="idiomaSeleciona.php?idioma=de">
            <img src="./icones/de_DE.png" alt="Deutsch">
          </a>
        </div>
        <div class="card-footer text-center">
          <small class="text-muted">de</small>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="card language-card h-100">
        <div class="card-body text-center">
          <h5 class="card-title"><?php echo $lng['japones']; ?></h5>
          <p class="text-muted">Japao</p>
          <a href="idiomaSeleciona.php?idioma=jpn">
            <img src="./icones/jp.png" alt="日本語">
          </a>
        </div>
        <div class="card-footer text-center">
          <small class="text-muted">jpn</small>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="card language-card h-100">
        <div class="card-body text-center">
          <h5 class="card-title"><?php echo $lng['italiano']; ?></h5>
          <p class="text-muted">Italia</p>
          <a href="idiomaSeleciona.php?idioma=it_IT">
            <img src="./icones/it_IT.png" alt="Italiano">
          </a>
        </div>
        <div class="card-footer text-center">
          <small class="text-muted">it</small>
        </div>
      </div>
    </div>
  </div> 
</div>

<?php include_once("rodape.php"); ?>