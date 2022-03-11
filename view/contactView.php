<?php ob_start(); ?>


        <div class=" mx-auto auth-container" >
            <h3>Contact Nous</h3>
            
            <span class="alert-primary"><?= isset( $msg ) ? $msg : null; ?></span>
                <form action="index.php?action=envoyerMessage" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label text-muted small text-uppercase">Expéditeur</label>
                        <input type="email" class="form-control" id="expediteur" name="expediteur" maxlength="20" value="<?= isset($mail) ? $mail : '' ?>" required/>
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label text-muted small text-uppercase">Object</label>
                        <input type="text" class="form-control" id="object" name="object" maxlength="30" value="<?= isset($_POST['object']) ? $_POST['object'] : '' ?>" required/>
                    </div>

                    <div class="mb-3">
                            <label for="text">Your message</label>
                                <textarea type="text" name="message" id="message" class="form-control"  maxlength="20"
                                style="font-style:italic;" rows="6" value="<?= isset($_POST['object']) ? $_POST['object'] : '' ?>"> </textarea>
                    </div>

                    <div class="mb-3">

                            <button type="submit" class="btn btn-primary btn-lg btn-block w-100">Envoyer</button>
                         
                    </div>
                   
                </form>
        </div>
    </div>

    <?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>