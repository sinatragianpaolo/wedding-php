<?php
session_start();
$requestUri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
// Verifica se l'utente è loggato
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    $requestUri=$requestUri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
    header("Location: $requestUri?page=login");
    exit;
}
?>

    <div class="backoffice-container container">
        <h1>Benvenuto nel Backoffice</h1>
        <p>Qui puoi gestire i contenuti del sito web.</p>
        <a href="<?="$requestUri?page=logout"?>">Logout</a>
    </div>
