<?php
class ConnectionData
{
    public string $dbHost;
    public string $dbUser;
    public string $dbPassword;
    public string $dbName;
    public function __construct()
    {
        // Inizializza le variabili
        $this->dbHost = 'localhost';
        $this->dbUser = 'weddinguser';
        $this->dbPassword = 'password';
        $this->dbName = 'wedding';

    }
}
?>