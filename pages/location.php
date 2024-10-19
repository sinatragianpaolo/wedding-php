<?php
include __DIR__ . '/../couplesData.php';
$currentWedsData = null;

foreach ($couplesData as $couple) {
  if ($couple['weds'] === 'giulia-e-filippo') {
    $currentWedsData = $couple;
    break;
  }
}
?>

<style>
  <?php include __DIR__ . '/../css/location.css'; ?>
</style>

<div class="container">
  <h1 class="title">La Nostra Location</h1>
  <h2 class="subtitle">Un luogo magico per un giorno indimenticabile</h2>
  <p class="paragraph">
    Siamo entusiasti di annunciare che il nostro matrimonio si terrà presso il
    <strong><?php echo $currentWedsData['location']['name']; ?></strong>, un luogo incantevole che
    trasmette amore e magia.
  </p>
  <p class="paragraph">
    Indirizzo: <strong><?php echo $currentWedsData['location']['address']; ?></strong>
  </p>
  <p class="paragraph">
    Il castello offre uno scenario da sogno, con splendidi giardini e sale eleganti,
    perfetto per celebrare il nostro amore con amici e familiari.
  </p>
  <a class="map-link" href="<?php echo $currentWedsData['location']['mapUrl']; ?>" target="_blank" rel="noopener noreferrer">
    Clicca qui per vedere la mappa
  </a>
</div>