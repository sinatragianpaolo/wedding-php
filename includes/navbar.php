<style>
    <?php
    include __DIR__ . '/../css/navbar.css';
    ?>
</style>

<nav class="nav">
    <?php
    $wedsData = getCoupleData($slug);
    ?>
    <button class="menu-toggle" id="menu-toggle">☰ <?= str_replace(" e ", " ♥💕❤ ", $wedsData["couple_name"]); ?></button>
    <ul class="nav-list" id="nav-list">
        <li class="nav-item"><a href="?page=home">Home</a></li>
        <li class="nav-item"><a href="?page=weds">Gli Sposi</a></li>
        <li class="nav-item"><a href="?page=scheduling">Programma</a></li>
        <li class="nav-item"><a href="?page=location">Location</a></li>
        <li class="nav-item"><a href="?page=gifts">ListaNozze</a></li>
        <li class="nav-item"><a href="?page=Foto">Foto</a></li>
        <li class="nav-item"><a href="?page=band">Band</a></li>
        <li class="nav-item"><a href="?page=fun">Divertiamoci</a></li>
        <li class="nav-item"><a href="?page=confirm">Conferma Presenza</a></li>

        <?php
        session_start();
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true): ?>
            <li class="nav-item"><a href="?page=login">Accedi al Backoffice</a></li>
        <?php else: ?>
            <li class="nav-item"><a href="?page=backoffice-home">Backoffice</a></li>
            <li class="nav-item logout"><a href="?page=logout">Logout</a></li>
        <?php endif; ?>
    </ul>
</nav>
<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
    <nav class="nav-backoffice">
        <ul class="nav-list backoffice" id="nav-list">
            <li class="nav-item backoffice nav-backoffice-title">Backoffice menu ➤</li>
            <li class="nav-item backoffice"><a href="?page=backoffice-home">Home</a></li>
            <li class="nav-item backoffice"><a href="?page=backoffice-gallery">Galleria</a></li>
        </ul>
    </nav>
<?php endif; ?>


<script>
    const menuToggle = document.getElementById('menu-toggle');
    const navList = document.getElementById('nav-list');

    menuToggle.addEventListener('click', () => {
        navList.style.display = navList.style.display === 'flex' ? 'none' : 'flex';
        menuToggle.textContent = navList.style.display === 'flex' ? '✖ Giulia ♥💕❤ Filippo' : '☰ Giulia ♥💕❤ Filippo';
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            navList.style.display = 'flex';
        } else {
            navList.style.display = 'none';
        }
    });
</script>