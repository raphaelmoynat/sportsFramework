<h1></h1>


<?php foreach ($sports as $sport): ?>

    <div class="sport border border-dark m-3">
        <h3><?= $sport->getName() ?></h3>
        <p><strong><?= $sport->getDescription() ?></strong></p>
        <p>Accessoire : <?= $sport->getAccessory() ?></p>
        <a href="?type=sport&action=show&id=<?= $sport->getId() ?>">Lien vers le <?=$sport->getName() ?></a>
    </div>

<?php endforeach; ?>

<a href="?type=sport&action=create&id=<?= $sport->getId() ?>">Créer</a>
