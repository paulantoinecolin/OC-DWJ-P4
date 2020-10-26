<div class="posts-container">
        <div class="post-content">

                <?php if ($_SESSION['isAdmin'] ): ?>
                    <a href="index.php?controller=article&task=write">Nouvel article</a>
                <?php endif;?>

            <?php foreach ($articles as $article) : ?>
                <div class="card border-dark" style="width: 100%;">
                <div class="card-body">
                    <h2 class="card-title"><?= $article['posttitle'] ?></h2>
                    <small><em>Ecrit le <?= $article['postcreatedate'] ?></em></small>
                    <p class="card-text"><?= excerpt(html_entity_decode($article['posttext'])) . "..." ?></p>
                    <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>" class="btn btn-dark">Lire la suite</a>
                    <?php if ($_SESSION['isAdmin'] ): ?>
                        <a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)" class="btn btn-secondary">Supprimer</a>
                    <?php endif;?>
                </div>
                </div>
            <?php endforeach ?>

    </div>
</div>