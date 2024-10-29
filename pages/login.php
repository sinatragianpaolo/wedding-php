<?php
session_start();

$requestUri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

if ($_SESSION['logged_in'] === true) {
    header("Location: $requestUri?page=home");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $user = getDataFromQuery("SELECT id, weds_id, password FROM users WHERE email = :email LIMIT 1", ['email' => $email]) ?? [];
    $wedFromSlug = getDataFromQuery("SELECT id FROM weds WHERE slug = :slug LIMIT 1", ['slug' => $slugCouple]) ?? [];



    if ($user["weds_id"] === $wedFromSlug["id"]) {
        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['logged_in'] = true;
            header("Location: $requestUri?page=backoffice");
            exit;
        } else {
            $error = "Email o password errata!";
        }
    } else {
        $error = "Non hai i permessi per accedere a questa pagina!";
    }
}
?>

<div class="login-container container">
    <h2>Login Backoffice</h2>
    <?php if (!empty($error)) {
        echo "<p class='error'>$error</p>";
    } ?>
    <form method="POST" action="<?= "$requestUri?page=login" ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Accedi</button>
    </form>
</div>