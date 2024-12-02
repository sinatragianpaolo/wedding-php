<?php
redirectLoginIfLoggedOut();

require_once __DIR__ . '/../../class/WedsPages.php';

$wedsPages = new WedsPages($wedsData['id']);
$pages = $wedsPages->pages;
//var_dump($pages);
?>
<br\>
    <style>
        <?= include __DIR__ . '/../../css/pages.css'; ?>
    </style>
    <script>
        function trackChanges(cardId) {
            const saveButton = document.getElementById(`save-${cardId}`);
            const nameInput = document.getElementById(`name-${cardId}`);
            const enabledCheckbox = document.getElementById(`enabled-${cardId}`);
            const originalName = nameInput.getAttribute('data-original');
            const originalEnabled = enabledCheckbox.getAttribute('data-original');

            const isModified =
                nameInput.value !== originalName ||
                enabledCheckbox.checked.toString() !== originalEnabled;

            saveButton.disabled = !isModified;
        }

        async function saveChanges(cardId) {
            const name = document.getElementById(`name-${cardId}`).value;
            const enabled = document.getElementById(`enabled-${cardId}`).checked;

            const response = await fetch('/features/savePages.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: cardId,
                    name,
                    enabled
                }),
            });

            if (response.ok) {
                alert('Modifiche salvate!');
                window.location.reload();
            } else {
                alert('Errore durante il salvataggio.');
            }
        }
    </script>
    <div class="container">


        <div>

            <h1>Modifica Pagine</h1>
            <div class="container">
                <?php foreach ($pages as $page): ?>
                    <div class="card">
                        <h2>
                            <?= htmlspecialchars($page['name']) ?>
                            <button type="button" onclick="document.getElementById('content-<?= $page['id'] ?>').classList.toggle('hidden')">
                                Apri/Chiudi
                            </button>
                        </h2>
                        <div id="content-<?= $page['id'] ?>" class="hidden">
                            <div>
                                <label>
                                    Nome pagina:
                                    <input
                                        type="text"
                                        id="name-<?= $page['id'] ?>"
                                        value="<?= htmlspecialchars($page['name']) ?>"
                                        data-original="<?= htmlspecialchars($page['name']) ?>"
                                        oninput="trackChanges(<?= $page['id'] ?>)">
                                </label>
                            </div>
                            <div>
                                <label>
                                    Visibile:
                                    <input
                                        type="checkbox"
                                        id="enabled-<?= $page['id'] ?>"
                                        <?= $page['enabled'] ? 'checked' : '' ?>
                                        data-original="<?= $page['enabled'] ?>"
                                        onchange="trackChanges(<?= $page['id'] ?>)">
                                </label>
                            </div>
                            <div>
                                <button
                                id="save-<?= $page['id'] ?>"
                                onclick="saveChanges(<?= $page['id'] ?>)"
                                disabled>
                                Salva
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>