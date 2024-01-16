<h1>Voici comment modifier un club</h1>

<form action="" method="post" class="form-control">

    <input value="<?= $club->getName() ?>"  placeholder="name" type="text" name="name" class="form-control">

    <input type="hidden" name="idEdit" value="<?= $club->getId() ?>">
    <button class="btn btn-primary" type="submit" >Modifier</button>

</form>
