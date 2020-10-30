<div class="container">
    <div class="news">

    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Commentaire</th>
                    <th scope="col">Article</th>
                </tr>
            </thead>
  <tbody>
      <?php foreach ($commentaires as $commentaire) : ?>
      <tr>
      <th scope="row"><?= $commentaire['commentpseudo'] ?></th>
      <td><small>Le <?= $commentaire['commentcreationdate'] ?></small></br><?= $commentaire['commenttext'] ?></td>
      <td>
            <h2 class="#<?= $commentaire['id'] ?>"><?= $articles_id ?></h2>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

        
            