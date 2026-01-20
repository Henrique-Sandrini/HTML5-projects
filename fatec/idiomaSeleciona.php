<?php
session_start();

// If no idioma param, nothing to do
if (!isset($_GET['idioma'])) {
    // redirect back to previous page or index
    header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'index.php'));
    exit;
}

$input = $_GET['idioma'];

// normalization map: accept short codes or full codes
$map = [
    'pt' => 'pt_BR',
    'pt_br' => 'pt_BR',
    'pt-br' => 'pt_BR',
    'pt_br.lang' => 'pt_BR',
    'pt_BR' => 'pt_BR',
    'en' => 'en_US',
    'en_us' => 'en_US',
    'en-us' => 'en_US',
    'en_US' => 'en_US',
    'es' => 'es_ES',
    'es_es' => 'es_ES',
    'es-es' => 'es_ES',
    'es_ES' => 'es_ES',
    'de' => 'de_DE',
    'de_de' => 'de_DE',
    'de-de' => 'de_DE',
    'de_DE' => 'de_DE',
    'jpn' => 'jpn_JPN',
    'jpn_jpn' => 'jpn_JPN',
    'jpn-jpn' => 'jpn_JPN',
    'jpn_JPN' => 'jpn_JPN',
    'it' => 'it_IT',
    'it_it' => 'it_IT',
    'it-it' => 'jpn_IT',
    'it_IT' => 'jpn_IT',
];

// normalize key
$key = strtolower(str_replace(['-', '.'], ['_', '_'], $input));

if (isset($map[$key])) {
    $_SESSION['idioma'] = $map[$key];
} else {
    // if user passed a full known code, accept it
    $possible = ['pt_BR', 'en_US', 'es_ES', 'de_DE','jpn_JPN','it_IT'];
    if (in_array($input, $possible)) {
        $_SESSION['idioma'] = $input;
    }
}

// Redirect back to referring page if available
$redirect = $_SERVER['HTTP_REFERER'] ?? 'index.php';
header('Location: ' . $redirect);
exit;
?>