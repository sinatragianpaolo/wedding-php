<?php
function    getCoupleData($slug) {
    $dsn = 'mysql:host=localhost;dbname=wedding;charset=utf8mb4';
    $username = 'weddinguser';
    $password = 'password';

    try {
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT slug FROM weds WHERE slug = :slug";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':slug', $slug);
        $stmt->execute();
        
        $couple = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    // Chiude la connessione
    $conn = null;

    // Restituisci i dati della coppia o null se non trovati
    return $couple;
}

?>
