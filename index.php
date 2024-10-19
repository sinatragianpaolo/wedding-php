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
  include __DIR__ . '/includes/navbar.php';
  include __DIR__ . '/features/getCoupleData.php';


  $page = $_GET['page'] ?? 'home';

  echo "pages: $page";

  echo "<br>";

  echo "slug: $slug";

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
    default:
      include 'pages/home.php';
      break;
    case 'fun':
      include 'pages/fun.php';
      break;

  }
  ?>

</body>

</html>