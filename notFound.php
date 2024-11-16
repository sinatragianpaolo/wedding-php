<!DOCTYPE html>
<html lang="it">

<?php
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$base_url = "$scheme://$host";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Pagina non trovata</title>
    <link rel="stylesheet" href="/css/notFound.css">
</head>

<body>
    <div class="container">
        <h1>🎉 COMPLIMENTI! 🎉</h1>
        <h2>Hai trovato una pagina che non esiste! 😱</h2>
        <p class="message">
            Ma ahimè, questa pagina è un mistero...<br>
            Puoi provare a fare una nuotata oppure a controllare l'URL e ricaricare la pagina. Assicura di aver
            digitato correttamente
            l'indirizzo e di aver indossato le pinne. <br>

            L'URL dovrebbe contenere i nomi degli sposi, eccoti un esempio:
            <strong><?= $base_url ?>/alice-e-bob</strong><br>
            Se il problema persiste, contatta il supporto tecnico, scrivendo alla mail: <br>
            g-s@example.com
        </p>
        <div class="image-container">
            <div><img src="<?= $base_url ?>/assets/images/404_funny.png" alt="Pagina non trovata" class="funny-image img-1"></div>
            <div><img src="<?= $base_url ?>/assets/images/wedding_404.png" alt="Pagina non trovata" class="funny-image img-2"></div>
        </div>
    </div>
    <div class="buttons">
        <a href="javascript:history.back()" class="btn-back">🔙 Torna indietro</a>
    </div>

    <div class="emoji">
        🌟🌈💥🎈🎉
    </div>
    </div>
</body>

</html>