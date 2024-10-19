<style>
  <?php include __DIR__ . '/../css/navbar.css'; ?>
</style>

<nav class="nav">
    <button class="menu-toggle" id="menu-toggle">☰ Giulia ♥💕❤ Filippo</button>
    <ul class="nav-list" id="nav-list">
        <li class="nav-item"><a href="index.php?page=home">Home</a></li>
        <li class="nav-item"><a href="index.php?page=weds">Gli Sposi</a></li>
        <li class="nav-item"><a href="index.php?page=scheduling">Programma</a></li>
        <li class="nav-item"><a href="index.php?page=location">Location</a></li>
        <li class="nav-item"><a href="index.php?page=gifts">ListaNozze</a></li>
        <li class="nav-item"><a href="index.php?page=Foto">Foto</a></li>
        <li class="nav-item"><a href="index.php?page=band">Band</a></li>
        <li class="nav-item"><a href="index.php?page=fun">Divertiamoci</a></li>
        <li class="nav-item"><a href="index.php?page=confirm">Conferma Presenza</a></li>
    </ul>
</nav>

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