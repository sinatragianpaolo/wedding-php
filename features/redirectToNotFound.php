<?php
function redirectToNotFound() {
    header("HTTP/1.0 404 Not Found");

    header("Location: /notFound.php");

    exit();
}
?>