<?php
function redirectLoginIfLoggedOut()
{
    session_start();
    $requestUri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
    // Verifica se l'utente è loggato
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        $requestUri = $requestUri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
        header("Location: $requestUri?page=login");
        exit;
    }
}
