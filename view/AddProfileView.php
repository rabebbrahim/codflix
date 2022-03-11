<?php ob_start(); ?>

      <div class="col-md-6 full-height bg-white">
        <div class="">
        <h1>Ajouter un utulisateur </h1>
        <span class="alert-primary"><?= isset( $msg ) ? $msg : null; ?></span>
          <form method="post" action="index.php?action=profilSaveAdd" class="custom-form">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="name" name="name" value="" id="Name" class="form-control" />
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" value="" id="email" class="form-control" />
            </div>
            <div class="form-group">
              <label for="password">password</label>
              <input type="password" name="password" value="" id="password" class="form-control" />
            </div>
            <div class="form-group">
              <label for="password_confirm">Confirmez votre mot de passe</label>
              <input type="password" name="password_confirm" value="" id="password_confirm" class="form-control" />
            </div>

            <div class="form-group">
              <label for="password">Type</label>
              <select class="form-control" name="type">
                  <option value="">--Choisissez une Typer--</option>
                  <?php foreach ($types as $ty): ?>
                      <option value="<?= $ty['id']; ?>"><?= $ty['name']; ?></option>
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
            <span class="error-msg">
              <?= isset( $error_msg ) ? $error_msg : null; ?>
            </span>
         
          </form>
        </div>
      </div>
 <?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>