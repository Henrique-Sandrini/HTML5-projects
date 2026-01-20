<?php
include_once("cabec.php");
include_once("config.php");

$msg = ''; // Mensagem de feedback

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $senha_confirm = $_POST['senha_confirm'] ?? '';

    if (!$nome || !$email || !$senha || !$senha_confirm) {
        $msg = $lng['msgPreenchaCampos'];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = $lng['msgEmailInvalido'];
    } elseif ($senha !== $senha_confirm) {
        $msg = $lng['msgSenhaNaoConfere'];
    } else {
        $conexao = db_connect();

        $sqlCheck = "SELECT usuCodigo FROM usuario WHERE usuMail = :email";
        $stmtCheck = $conexao->prepare($sqlCheck);
        $stmtCheck->bindParam(':email', $email);
        $stmtCheck->execute();

        if ($stmtCheck->rowCount() > 0) {
            $msg = $lng['msgEmailCadastrado'];
        } else {
            $hashSenha = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuario (usuNome, usuMail, usuSenha) VALUES (:nome, :email, :senha)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $hashSenha);

            if ($stmt->execute()) {
                header("Location: login.php?msg=cadastro_sucesso");
                exit;
            } else {
                $msg = $lng['msgErroCadastro'];
            }
        }
    }
}
?>

<style>
    body {
        background-image: url('fundo.jpg');
        /* mantém o fundo */
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        font-family: 'Montserrat', sans-serif;
    }

    .content-container {
        max-width: 600px;
        margin: 80px auto;
        background: rgba(255, 255, 255, 0.85);
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .content-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }
</style>

<div class="content-container">
    <h2><?php echo $lng['cadastroTitulo']; ?></h2>

    <?php if ($msg): ?>
        <div class="alert alert-warning text-center"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="nome" class="form-label"><?php echo $lng['cadastroNome']; ?></label>
            <input type="text" id="nome" name="nome" class="form-control"
                value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label"><?php echo $lng['cadastroEmail']; ?></label>
            <input type="email" id="email" name="email" class="form-control"
                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label"><?php echo $lng['cadastroSenha']; ?></label>
            <input type="password" id="senha" name="senha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="senha_confirm" class="form-label"><?php echo $lng['cadastroConfirmaSenha']; ?></label>
            <input type="password" id="senha_confirm" name="senha_confirm" class="form-control" required>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary"><?php echo $lng['cadastroBotao']; ?></button>
            <a href="login.php" class="btn btn-link"><?php echo $lng['cadastroVoltarLogin']; ?></a>
        </div>
    </form>
</div>

<?php include_once("rodape.php"); ?>