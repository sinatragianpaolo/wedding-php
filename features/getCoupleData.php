<?php
// getCoupleData.php
// include getSlugFromUrl.php';

include __DIR__ . '/getSlugFromUrl.php';


function getCoupleData($slug) {
    // Dettagli connessione database
    $dsn = 'mysql:host=localhost;dbname=wedding;charset=utf8mb4';
    $username = 'weddinguser';
    $password = 'password';

    try {
        // Crea la connessione usando PDO
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Cerca i dati della coppia di sposi in base allo slug
        $sql = "SELECT * FROM weds WHERE slug = :slug";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':slug', $slug);
        $stmt->execute();
        
        // Recupera i dati della coppia se esistono
        $couple = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    // Chiude la connessione
    $conn = null;

    // Restituisci i dati della coppia o null se non trovati
    return $couple;
}


// Richiamare la funzione per ottenere i dati
if ($slug = getSlugFromUrl()) {
    $coupleData = getCoupleData($slug);
    if ($coupleData) {
        // Mostra i dati della coppia
        var_dump($coupleData);
    } else {
        echo "Coppia non trovata.";
    }
}
?>
