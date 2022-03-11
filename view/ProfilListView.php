<?php ob_start(); ?>
<div class="row">
    <div class="col-md-4 offset-md-8">
        <!-- <div class="col-md-6 "> -->
                <a href="index.php?action=addProfil"class="btn btn-block bg-red " style="
    margin-bottom: 20px;
">Ajouter Un profil</a>
        <!-- </div> -->
    </div>
</div>

<div class="media-list">
    <table  class="table table-dark">
        <thead>
            <tr> <th>Image </th>    
                <th>Nom</th>
                <th>type</th>
                <th>date</th>                    
                <th></th>
            </tr>
        </thead>
        <tbody>
        <input type="hidden" value="" id="id" name="id">
            <?php foreach ($list as $profil): ?>
            <tr>
                <th><img src ="<?= $profil['avatar']; ?>"  class="rounded" width="50px"></th>
                <th><?= $profil['name']; ?></th>
                <th><?= $profil['type']; ?>
                </th>
                <th><?= $profil['dat_cre']; ?></th>
                <th>
                <a href="index.php?action=updateprofil&id=<?= $profil['id'] ?>"  class="btn btn-warning">Modifier</a>
                <a href="index.php?action=deletprofil&email=<?= $profil['email'] ?>" " class="btn btn-danger">Supprimer</a>
                <!-- </form> -->
                </th>
            
            </tr>
            <?php endforeach; ?>
            <tbody>
</table>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
