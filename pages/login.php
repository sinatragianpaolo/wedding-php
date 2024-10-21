<?php
session_start();

$requestUri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

if($_SESSION['logged_in']===true){
    header("Location: $requestUri?page=home");
    exit;

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ottieni email e password dalla richiesta POST
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validazione semplice (puoi estendere con query al database)
    $correctEmail = "admin@example.com";
    $correctPassword = "password"; // Usa hashing delle password in un'app reale

    if ($email === $correctEmail && $password === $correctPassword) {
        // Imposta la sessione per l'utente loggato
        $_SESSION['logged_in'] = true;
       
        header("Location: $requestUri?page=backoffice");
        exit;
    } else {
        $error = "Email o password errata!";
    }
}
?>

<div class="login-container container">
    <h2>Login Backoffice</h2>
    <?php if (!empty($error)) {
        echo "<p class='error'>$error</p>";
    } ?>
    <form method="POST" action="<?="$requestUri?page=login"?>">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Accedi</button>
    </form>
</div>