<div class="posts-container">
        <div class="post-content">

        <?php if ($_SESSION['isAdmin']): ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/">MENU</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link active" href="/">Articles</a>
      <a class="nav-link" href="/index.php?controller=article&task=moderation">Commentaires</a>
      <div class="btn-nav"><a class="btn navbar-btn" href="/index.php?controller=user&task=logout"><img class="logout" src="../svg/logout.svg" alt="" width="32" height="32" title="logout"></a>
        </div>  
    </div>
  </div>
</nav>
<?php endif;?>

        <?php if ($_SESSION['isAdmin']): ?>
          <div class="card border-dark" style="width: 100%;">
    <div class="card-body">
      <a href="index.php?controller=article&task=write"><img src="../svg/plus-circle.svg" alt="" width="32" height="32" title="plus-circle" class="btn_newarticle">Rédiger un nouvel article</a>
    </div>
  </div>
        </br>
<?php endif;?>

            <?php foreach ($articles as $article) : ?>
                <div class="card border-dark" style="width: 100%;">
                <div class="card-body">
                <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>"><h2 class="card-title"><?= $article['posttitle'] ?></h2></a>
                    <small><em>Ecrit le <?= $article['postcreatedate'] ?></em></small>
                    <p class="card-text"><?= excerpt(html_entity_decode($article['posttext'])) . "..." ?></p>
                    <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>" class="btn btn-dark">Lire la suite</a>
                    <?php if ($_SESSION['isAdmin']): ?>
                        <a href="index.php?controller=article&task=edit&id=<?= $article['id'] ?>" class="btn btn-outline-secondary"><img src="../svg/pencil-square.svg" alt="" width="24" height="24" title="pencil-square"></a>
                        <a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)" class="btn btn-outline-secondary"><img src="../svg/trash.svg" alt="" width="24" height="24" title="trash"></a>
                        <?php endif;?>
                </div>
                </div>
            <?php endforeach ?>

    </div>
</div>