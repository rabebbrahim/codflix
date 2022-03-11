<?php ob_start(); ?>

<div class="row">
    <div class="col-md-4 offset-md-8">
        <form method="get"  action="index.php?">
            <div class="form-group has-btn">
                <input type="search" id="search" name="title" value="<?= $search; ?>" class="form-control"
                       placeholder="Rechercher un film ou une série">

                <button type="submit" class="btn btn-block bg-red">Valider</button>
            </div>
        </form>
    </div>
</div>


<div class="media-list">
    <?php foreach( $medias as $media ): ?>
    <div class=" col-md-4 ">
        <a class="item" href="index.php?media=<?= $media['id']; ?>">
            <div class="video">
                <div>
                    <iframe allowfullscreen="" frameborder="0"
                            src="<?= $media['trailer_url']; ?>" ></iframe>
                </div>
            </div>
        </a> 
        <form action="index.php?action=addfavoris" method="post" id="myForm">
                    <input type="hidden" name="id" value="" id="id" class="form-control" />
</form>
        <div class="row title">
            <div class=" col-6">
                <?= $media['title']; ?>
            </div>
        </div>
        <button name="<?= $media['id']; ?>" id="like_<?= $media['id']; ?>" class="btn like" ><i class="fas fa-thumbs-up"></i></button>
        <button name="<?= $media['id']; ?>" id="unlike_<?= $media['id']; ?>" class="btn unlike"><i class="fas fa-thumbs-down"></i></button>
          <button  name="<?= $media['id']; ?>" id="<?= $media['id']; ?>" class="btn fav fav_<?= $media['id']; ?>">
                        favoris <i class="fas fa-plus-circle"></i>
                    </button>
    </div>
    <?php endforeach; ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
