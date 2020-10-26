<div class="posts-container">
        <div class="post-content">

                <?php if (!$_SESSION['isAdmin'] ): ?>
                    <a href="index.php?controller=article&task=write">REDIGER UN NOUVEL ARTICLE<img src="../svg/plus-circle.svg" alt="" width="32" height="32" title="plus-circle"></a>
                <?php endif;?>

            <?php foreach ($articles as $article) : ?>
                <div class="card border-dark" style="width: 100%;">
                <div class="card-body">
                    <h2 class="card-title"><?= $article['posttitle'] ?></h2>
                    <small><em>Ecrit le <?= $article['postcreatedate'] ?></em></small>
                    <p class="card-text"><?= excerpt(html_entity_decode($article['posttext'])) . "..." ?></p>
                    <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>" class="btn btn-dark">Lire la suite</a>
                    <?php if (!$_SESSION['isAdmin'] ): ?>
                        <a href="index.php?controller=article&task=edit&id=<?= $article['id'] ?>" class="btn btn-secondary"><img src="../svg/pencil-square.svg" alt="" width="24" height="24" title="pencil-square"></a>
                        <a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)" class="btn btn-secondary"><img src="../svg/trash.svg" alt="" width="24" height="24" title="trash"></a>
                        <?php endif;?>
                </div>
                </div>
            <?php endforeach ?>

    </div>
</div>