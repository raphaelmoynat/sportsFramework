<div class="sport border border-dark m-3">
    <h3><?= $sport->getName() ?></h3>
    <p><strong><?= $sport->getDescription() ?></strong></p>
    <p>Accessoire : <?= $sport->getAccessory() ?></p>
    <a href="?type=sport&action=index">Retour</a>
</div>