<?php
// confirm_attendance.php

$submitted = false;
$name = '';
$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST['name'] ?? '';
  $message = $_POST['message'] ?? '';
  // Qui puoi gestire l'invio dei dati, ad esempio a un API
  $submitted = true;
}
?>

<style>
  <?php include __DIR__ . '/../css/confirm.css'; ?>
</style>

<div class="container">
  <h1 class="title title-confirm">Conferma la Tua Presenza</h1>
  <p class="paragraph message-confirm">Ci farebbe piacere sapere se potrai essere presente nel nostro giorno speciale. Compila il modulo
    qui sotto!</p>

  <?php if ($submitted): ?>
    <p class="confirmation-message">Grazie per aver confermato la tua presenza!</p>
    <style>
      .message-confirm, .title-confirm  {
        display: none;
      }
    </style>
  <?php else: ?>
    <form class="form" method="POST" action="">
      <input class="input" type="text" name="name" placeholder="Il tuo nome, o della tua famiglia"
        value="<?php echo htmlspecialchars($name); ?>" required />
      <textarea class="textarea" name="message" placeholder="Messaggio personale (opzionale). Scrivi qui se hai qualche informazione da comunicarci. Ci farebbe anche piacere se ci dicessi se hai allergie o intolleranze alimentari."
        rows="4"><?php echo htmlspecialchars($message); ?></textarea>
      <button class="button" type="submit">Invia Conferma</button>
    </form>
  <?php endif; ?>
</div>