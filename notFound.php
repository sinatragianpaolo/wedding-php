

    <div class="container">
        <h1>Oops! Pagina non trovata</h1>
        <p>La pagina che stai cercando potrebbe essere stata rimossa, rinominata o è temporaneamente non disponibile.
        </p>

        <?php
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];

        $base_url = "$scheme://$host";
        ?>

        <p>Puoi provare a controllare l'URL e ricaricare la pagina. Assicrati di aver digitato correttamente
            l'indirizzo.</p>
        <p>L'URL dovrebbe contenere i nomi degli sposi, eccoti un esempio: <strong><?=$base_url?>/alice-e-bob</strong></strong></p>
        <p>Se il problema persiste, contatta il supporto tecnico, scrivendo alla mail: g-s@example.com</p>