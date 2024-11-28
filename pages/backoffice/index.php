<?php
session_start();
$requestUri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
// Verifica se l'utente è loggato
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    $requestUri = $requestUri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
    header("Location: $requestUri?page=login");
    exit;
}
?>

<div class="backoffice-container container">
    <h1>Benvenuto nel Backoffice</h1>
    <p>Qui puoi gestire i contenuti del sito web. In particolare:</p>
    <p> Modificare i dati degli sposi
        <br>Aggiungere o modificare la location del matrimonio
        <br>Aggiungere o modificare il programma del matrimonio
        <br>Aggiungere o modificare la lista nozze
        <br>Aggiungere o modificare le informazioni sulla band
        <br>Aggiungere o modificare le informazioni sulla fotografa
        <br>Aggiungere o modificare le informazioni sulla sezione "Divertiamoci"
        <br>Visualizzare le conferme di presenza
    </p>
    <p>
        Nella pagina <strong>Galleria</strong> puoi gestire le foto delle pagine sito.
    </p>
</div>