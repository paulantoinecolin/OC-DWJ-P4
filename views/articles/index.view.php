<?= var_dump($_SESSION); ?> 

<div class="jumbotron">
  <div class="container">
    <h1 class="display-4 font-weight-bold"">Jean Forteroche, écrivain sans histoires</h1>
    <p class="lead font-weight-bold font-italic">Chaque jour retrouvez un nouveau chapitre de mon livre</p>
  </div>
  </div>
 
    <div class="posts-container">
        <div class="post-content">

            <a href="index.php?controller=article&task=write">Nouvel article</a>

            <?php foreach ($articles as $article) : ?>
                <h2><?= $article['posttitle'] ?></h2>
                <small>Ecrit le <?= $article['postcreatedate'] ?></small>
                <p><?= excerpt(html_entity_decode($article['posttext'])) . "..." ?></p>
                <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Lire la suite</a>
                <a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
            <?php endforeach ?>

    </div>
</div>