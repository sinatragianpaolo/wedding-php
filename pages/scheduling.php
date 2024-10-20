<?php
include __DIR__ . '/../couplesData.php';
$currentWedsData = null;

foreach ($couplesData as $couple) {
    if ($couple['weds'] === $slug) {
        $currentWedsData = $couple;
        break;
    }
}
?>

<style>
    <?php include __DIR__ . '/../css/scheduling.css'; ?>
</style>

<div class="container">
    <?php if ($currentWedsData): ?>
        <h1 class="title">Matrimonio di <?php echo htmlspecialchars($currentWedsData['coupleName']); ?></h1>
        <p class="paragraph">
            <strong>Data del Matrimonio:</strong> <?php echo htmlspecialchars($currentWedsData['date']); ?>
        </p>
        <p class="paragraph">
            <strong>Cosa portare:</strong> Costume elegante, scarpe comode, e tanta allegria!
        </p>
        <p class="paragraph">
            <strong>Cosa lasciare a casa:</strong> Telefoni cellulari, e qualsiasi altra distrazione.
        </p>

        <!-- Timeline degli<?php echo htmlspecialchars($currentWedsData['location']['name']); ?> eventi -->
        <div class="timeline">
            <?php foreach ($currentWedsData['scheduledEvents'] as $event): ?>
                <div class="timeline-item">
                    <div class="timeline-icon"></div>
                    <div class="timeline-content">
                        <h2><?php echo htmlspecialchars($event['time']); ?> - <?php echo htmlspecialchars($event['title']); ?>
                        </h2>
                        <p><?php echo htmlspecialchars($event['description']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="paragraph">Nessuna informazione disponibile per la coppia selezionata.</p>
    <?php endif; ?>
</div>