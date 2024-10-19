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
  <?php include __DIR__ . '/../css/gifts.css'; ?>
</style>

    <div class="container">
        <h1 class="title">Lista dei Regali</h1>
        <p class="paragraph">La vostra presenza è il regalo più prezioso che possiamo desiderare.</p>

        <?php if (!empty($currentWedsData['gifts'])): ?>
            <h2 class="subtitle">Regali Desiderati</h2>
            <p class="paragraph">Se volete rendere questo giorno ancora più speciale, ecco alcune idee che abbiamo pensato:</p>
            <ul class="gifts-list">
                <?php foreach ($currentWedsData['gifts'] as $gift): ?>
                    <li class="gift-item"><?php echo $gift; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="paragraph">Non abbiamo ancora aggiornato la lista dei regali, ma ogni gesto d'amore è sempre benvenuto!</p>
        <?php endif; ?>

        <?php if (!empty($currentWedsData['iban'])): ?>
            <h2 class="subtitle">Un Pensiero Speciale</h2>
            <p class="paragraph">Se desiderate contribuire con un pensiero speciale, potete utilizzare il seguente IBAN. Ma ricordate, il vostro affetto è il regalo più importante per noi:</p>
            <p class="iban"><?php echo $currentWedsData['iban']; ?></p>
        <?php endif; ?>
    </div>