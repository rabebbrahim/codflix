<?php ob_start(); ?>


      <div class="col-md-6 full-height bg-white">
        <div class="auth-container">
          <form method="post" action="index.php?action=savemyprofil" class="custom-form">
         
          <img src ="<?= $profil['avatar']; ?>"  class="rounded" width="50px">
            <div class="form-group">
              <label for="Name">Name</label>
              <input type="name" name="name" value="<?= $profil['name']; ?>" id="Name" class="form-control" />
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" value="<?= $profil['email']; ?>" id="Name" class="form-control" />
            </div>

            <div class="form-group">
              <label for="password">Genres</label>
              <select class="form-control" name="type">
                  <option value="">--Choisissez une Typer--</option>
                 
                  <?php foreach ($types as $ty): ?>   
                      <option value="<?= $ty['id']; ?>"
                      <?php if($profil['typ_id'] === $ty['id']):
                  echo "selected";
                  endif
                 ?>
                      ><?= $ty['name']; ?></option>
                  <?php endforeach; ?>
              </select>

            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <input type="submit" name="Valider" class="btn btn-block bg-red" />
                </div> 
              </div>
            </div>
            <span class="info-msg">
              <?= isset( $msg ) ? $msg : null; ?>
            </span>
          </form>
        </div>
      </div>
 <?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>