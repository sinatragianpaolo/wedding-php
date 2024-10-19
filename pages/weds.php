<?php
include __DIR__ . '/../couplesData.php';
$currentWedsData = null;

foreach ($couplesData as $couple) {
    if ($couple['weds'] === 'giulia-e-filippos') {
        $currentWedsData = $couple;
        break;
    }
}
?>

<style><?php include __DIR__ . '/../css/weds.css'; ?></style>

<div class="container">
    <h1 class="title">Gli Sposi: <?php echo $currentWedsData['coupleName']; ?></h1>

    <?php if (!empty($currentWedsData['img'])): ?>
        <img src="<?php echo $currentWedsData['img']; ?>" alt="Foto di <?php echo $currentWedsData['coupleName']; ?>"
            class="image">
    <?php endif; ?>

    <h2 class="subtitle">Qualche info su di loro</h2>
    <p class="paragraph"><?php echo $currentWedsData['details']; ?></p>


    <h2 class="subtitle">Dettagli del Matrimonio</h2>
    <p class="paragraph">
        Siamo entusiasti di celebrare il nostro giorno speciale con voi!
        Il matrimonio si terrà presso "<?php echo $currentWedsData['location']['name']; ?>" il
        <?php echo $currentWedsData['date']; ?>.
    </p>

    <h2 class="subtitle">Curiosità sulla Coppia</h2>
    <p class="paragraph">
        <?php echo !empty($currentWedsData['funFacts']) ? $currentWedsData['funFacts'] : 'Aggiungeremo presto alcune curiosità interessanti su di noi!'; ?>
    </p>
</div>