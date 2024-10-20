<?php
require_once 'ConnectionData.php';
function getDataFromQuery(string $query, array $params = [])
{
    try {
       
        $connectionData = new ConnectionData();

        $dsn = "mysql:host={$connectionData->dbHost};dbname={$connectionData->dbName};charset=utf8mb4";

        $conn = new PDO($dsn, $connectionData->dbUser, $connectionData->dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepara la query
        $stmt = $conn->prepare($query);

        // Itera i parametri passati e legali ai segnaposto della query
        foreach ($params as $key => $value) {
            $stmt->bindValue(":$key", $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }

        // Esegui la query
        $stmt->execute();

        // Ottieni i risultati
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    // Chiude la connessione
    $conn = null;

    return $res;
}
?>