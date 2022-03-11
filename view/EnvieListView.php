<?php ob_start(); ?>


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
        <div class="title"><?= $media['title']; ?></div>
        <button name="<?= $media['id']; ?>" id="like_<?= $media['id']; ?>" class="btn like" ><i class="fas fa-thumbs-up"></i></button>
        <button name="<?= $media['id']; ?>" id="unlike_<?= $media['id']; ?>" class="btn unlike"><i class="fas fa-thumbs-down"></i></button>
     </div>
    <?php endforeach; ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
