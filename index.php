<?php require_once __DIR__ . '/features/helpers.php'; ?>
<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Benvenuti al nostro Matrimonio!</title>
  <style>
    <?php include __DIR__ . '/css/style.css'; ?>
  </style>
</head>

<body>

  <?php
  $slug = getSlugFromUrl();
  $slugCouple = false;
  if ($slug = getSlugFromUrl()) {
    $slugCouple = getSlugCouple($slug);
  }

  $page = $_GET['page'] ?? 'notFound';


  $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
  $host = $_SERVER['HTTP_HOST'];
  $base_url = "$scheme://$host";


  include __DIR__ . '/includes/navbar.php';

  if ($slug && $slugCouple) {
    if ($page === 'notFound') {
      include 'pages/home.php';
    } else {
      switch ($page) {
        case 'weds':
          include 'pages/weds.php';
          break;
        case 'location':
          include 'pages/location.php';
          break;
        case 'scheduling':
          include 'pages/scheduling.php';
          break;
        case 'gifts':
          include 'pages/gifts.php';
          break;
        case 'confirm':
          include 'pages/confirm.php';
          break;
        case 'fun':
          include 'pages/fun.php';
          break;
        case 'login':
          include 'pages/login.php';
          break;
        case 'logout':
          include 'pages/logout.php';
          break;
        case 'backoffice':
          include 'pages/backoffice/backoffice.php';
          break;
        case 'band':
        case 'home':
        case 'foto':
        default:
          include 'pages/home.php';
          break;
      }
    }
  } else {
    redirectToNotFound();
  }

  ?>

</body>

</html>