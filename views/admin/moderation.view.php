<main class="posts-container">

    <?php if ($_SESSION['isAdmin']) : ?>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/">MENU</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" href="/">Articles</a>
            <a class="nav-link active" href="/index.php?controller=article&task=moderation">Commentaires</a>
            <div class="btn-nav"><a class="btn navbar-btn" href="/index.php?controller=user&task=logout"><img class="logout" src="../svg/logout.svg" alt="" width="32" height="32" title="logout"></a>
            </div>
          </div>
        </div>
      </nav>
    <?php endif; ?>

    <div class="card border-dark table_comments" style="width: 100%;">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">PSEUDO</th>
              <th scope="col">COMMENTAIRES SIGNALES</th>
              <th scope="col">ALLER VERS L'ARTICLE</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($comments as $comment) : ?>
              <tr>
                <th class="align-middle" scope="row"><?= $comment['commentpseudo'] ?></th>
                <td class="align-middle"><small>Le <?= $comment['commentcreationdate'] ?></small></br><?= $comment['commenttext'] ?>
                </td>
                <td class="align-middle">
                  <a href="index.php?controller=article&task=show&id=<?= $comment['id'] ?>#comment<?= $comment['comments_id'] ?>">
                    <h2><?= $comment['title'] ?></h2>
                  </a>
                  <a href="index.php?controller=comment&task=moderate&id=<?= $comment['id'] ?>" class="btn btn-outline-secondary"><img src="../svg/hand-thumbs-up.svg" alt="" width="24" height="24" title="hand-thumbs-up"></a>
                  <a href="index.php?controller=comment&task=delete&id=<?= $comment['id'] ?>" onclick="return window.confirm('Êtes vous sûr de vouloir supprimer ce commentaire ?')" class="btn btn-outline-secondary"><img src="../svg/trash.svg" alt="" width="24" height="24" title="trash"></a>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
  </div>
</main>