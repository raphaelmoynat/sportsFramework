<form action="" method="post" class="form-control">

    <input value="<?= $sport->getName() ?>"  placeholder="name" type="text" name="name" class="form-control">
    <input value="<?= $sport->getDescription() ?>" placeholder="description" type="text" name="description"  class="form-control">
    <input value="<?= $sport->getAccessory() ?>" placeholder="accessory" type="text" name="accessory"  class="form-control">

    <button class="btn btn-primary" type="submit" >Modifier</button>

</form>
<a href="?type=sport&action=index">Retour</a>

