<?php

// forceAdminConnection();
?>
 
    <div class="posts-container">
        <div class="post-content">

            <h1>Dashboard</h1>

            <?php foreach ($articles as $article) : ?>
                <h2><?= $article['posttitle'] ?></h2>
                <small>Ecrit le <?= $article['postcreatedate'] ?></small>
                <p><?= excerpt(html_entity_decode($article['posttext'])) . "..." ?></p>
                <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Lire la suite</a>
                <a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
            <?php endforeach ?>

    </div>
</div>