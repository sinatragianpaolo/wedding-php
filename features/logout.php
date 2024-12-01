<?php
function logout()
{
    session_start();
    session_destroy();
    $requestUri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
    ?>
    <script>
        window.location.href = "<?= $requestUri?>?page=login";
    </script>
    <?php
    exit;
}
?>