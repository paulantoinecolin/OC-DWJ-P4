<div class="container">
    <div class="news">

    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Commentaires signalés</th>
                    <th scope="col">Aller vers l'article</th>
                </tr>
            </thead>
  <tbody>
      <?php foreach ($comments as $comment) : ?>
      <tr>
      <th  scope="row"><?= $comment['commentpseudo'] ?></th>
      <td><small>Le <?= $comment['commentcreationdate'] ?></small></br><?= $comment['commenttext'] ?>
                </td>
      <td>

      <a href="index.php?controller=article&task=show&id=<?= $comment['id'] ?>#comment<?= $comment['comments_id'] ?>"><h2><?= $comment['title'] ?></h2></a>
      <a href="index.php?controller=comment&task=moderate&id=<?= $comment['id'] ?>" class="btn btn-outline-secondary"><img src="../svg/hand-thumbs-up.svg" alt="" width="24" height="24" title="hand-thumbs-up"></a>
                    <a href="index.php?controller=comment&task=delete&id=<?= $comment['id'] ?>" onclick="return window.confirm('Êtes vous sûr de vouloir supprimer ce commentaire ?')" class="btn btn-outline-secondary"><img src="../svg/hand-thumbs-down.svg" alt="" width="24" height="24" title="hand-thumbs-down"></a>    
    </tr>
    <?php endforeach ?>
  </tbody>
</table>