<?php
// autentica.php (substitua o existente)

$data = $_REQUEST;
extract($data);

include_once("config.php");

session_start();

// checar método e campos
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($email) || empty($senha)) {
    header('Location: login_erro.php');
    exit;
}

$email = trim($email);
$senha = $_POST['senha']; // não trim na senha por precaução

// valida email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: login_erro.php');
    exit;
}

try {
    $conexao = db_connect();

    // Busca pelo email (somente), com a hash da senha
    $sql = "SELECT usuCodigo, usuNome, usuSenha
            FROM usuario
            WHERE usuMail = :email
            LIMIT 1";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() !== 1) {
        // email não encontrado
        header('Location: login_erro.php');
        exit;
    }

    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $hashNoBanco = $dados['usuSenha'];

    // Verifica a senha usando password_verify
    if (password_verify($senha, $hashNoBanco)) {
        // Login OK → inicializa sessão e redireciona
        $_SESSION['logged_in'] = true;
        $_SESSION['usuCodigo'] = $dados['usuCodigo'];
        $_SESSION['usuNome'] = $dados['usuNome'];
        $_SESSION['TEMPO'] = time();

        header('Location: .'); // mantém o seu redirect original
        exit;
    } else {
        // senha inválida
        header('Location: login_erro.php');
        exit;
    }

} catch (Exception $e) {
    // Opcional: registrar o erro em log e redirecionar
    // error_log($e->getMessage());
    header('Location: login_erro.php');
    exit;
}
?>