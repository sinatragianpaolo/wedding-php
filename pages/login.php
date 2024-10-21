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

    $user = getDataFromQuery("SELECT * FROM users WHERE email = :email LIMIT 1", ['email' => $email]) ?? [];

    // Verify password
    if ($user && password_verify($password, $user['password'])) {
        // Set session
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
    <form method="POST" action="<?= "$requestUri?page=login" ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Accedi</button>
    </form>
</div>