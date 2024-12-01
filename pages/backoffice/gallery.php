<?php
redirectLoginIfLoggedOut();

// Definisci il path della cartella basata su uno slug
$galleryPath = "./gallery/$slug/";

// Crea la cartella se non esiste
if (!file_exists($galleryPath)) {
    mkdir($galleryPath, 0777, true);
}

$directory = "./gallery/$slug/";

// Crea la cartella se non esiste
if (!is_dir($directory)) {
    mkdir($directory, 0777, true);
}

// Recupera le foto dalla cartella
$photos = glob($directory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
$totalPhotos = count($photos);
$maxPhotos = 2;
$requestUri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

// Gestione caricamento file
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $totalPhotos < $maxPhotos) {
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $filePath = $directory . basename($_FILES['photo']['name']);
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $filePath)) {
            header("Location: $requestUri?page=backoffice-gallery");
            exit();
        } else {
            $error = "Errore nel caricamento della foto.";
        }
    }
}
?>
<style>
    <?= include __DIR__ . '/../../css/gallery.css'; ?>
</style>

<div class="container">
    <h1>Galleria Fotografica (<?= $totalPhotos . "/" . $maxPhotos; ?>)</h1>
    <p>Questa pagina ti consente di caricare fino a <?= $maxPhotos; ?> foto</p>
    <p>Le foto caricate potrai sceglierele e mostrarle nelle varie pagine.  </p>

    <?php if ($totalPhotos >= $maxPhotos): ?>
        <p class="max-message">Numero massimo di foto raggiunto. Rimuovi alcune foto prima di aggiungerne altre.</p>
    <?php endif; ?>

    <div class="gallery">
        <?php foreach ($photos as $photo): ?>
            <div class="card">
                <img src="<?= $photo; ?>" alt="Foto" class="gallery-image">
                <form method="post" action="delete.php">
                    <input type="hidden" name="photo" value="<?= $photo; ?>">
                    <button type="submit" class="btn delete-btn">Rimuovi</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if ($totalPhotos < $maxPhotos): ?>
        <form action='<?="$requestUri?page=backoffice-gallery"?>' method="post" enctype="multipart/form-data">
            <label for="photo">Carica una nuova foto:</label>
            <input type="file" name="photo" id="photo" accept="image/*" required>
            <button type="submit" class="btn upload-btn">Carica</button>
        </form>
    <?php endif; ?>
</div>
</body>