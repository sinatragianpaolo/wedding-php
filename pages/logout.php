<?php
session_start();
session_destroy();
$requestUri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
header("Location: $requestUri?page=login");
exit;
