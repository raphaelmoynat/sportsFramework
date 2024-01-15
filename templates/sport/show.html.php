<div class="sport border border-dark m-3">
    <h3><?= $sport->getName() ?></h3>
    <p><strong><?= $sport->getDescription() ?></strong></p>
    <p>Accessoire : <?= $sport->getAccessory() ?></p>
    <a href="?type=sport&action=index">Retour</a>
</div>

<div class="border border-dark mt-3 mb-5">
    <h3>Les clubs</h3>
    <?php foreach($sport->getClubs() as $club): ?>

        <div><strong><?= $club->getName() ?></strong></div>
        <a href="?type=club&action=delete&id=<?= $club->getId() ?>">Supprimer</a>
        <input type="hidden" name="idSport" value="<?= $sport->getId() ?>">


    <?php endforeach; ?>
</div>


<form action="?type=club&action=create" method="post" class="form-control">
    <h5>Ajouter un club</h5>
    <input placeholder="name" type="text" name="name" class="form-control">
    <input type="hidden" name="sportId" value="<?= $sport->getId() ?>">



    <button class="btn btn-primary" type="submit" >Ajouter</button>

</form>