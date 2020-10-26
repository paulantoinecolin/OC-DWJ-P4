<div class="container">
    <div class="news">

    <div class="card border-dark" style="width: 100%;">
    <div class="card-body">
        <h1 class="card-title"><?= $article['posttitle'] ?></h1>
            <small><em>Ecrit le <?= $article['postcreatedate'] ?></em></small></br>
            <?php if ($_SESSION['isAdmin'] ): ?>
                <a href="index.php?controller=article&task=edit&id=<?= $article['id'] ?>">Editer cet article</a>
            <?php endif;?>
        <hr>
        <p class="card-text"><?= html_entity_decode($article['posttext']) ?></p>
    </div>
    </div>

    <?php if (count($commentaires) === 0) : ?>
        <h2>Il n'y a pas encore de commentaires pour cet article...</h2>
        <?php else : ?>
            <h2>Il y a déjà <?= count($commentaires) ?> réactions : </h2>
            <?php foreach ($commentaires as $commentaire) : ?>
                <div class="card" style="width: 100%;">
                <div class="card-body">
            <h3 class="card-title #<?= $commentaire['id'] ?>"><?= $commentaire['commentpseudo'] ?></h3>
            <small><em><?= $commentaire['commentcreationdate'] ?></small></em>
            <blockquote><?= $commentaire['commenttext'] ?></blockquote>

        <?php if (!$commentaire['commentflagged']) { ?>
            <div class="alert alert-danger"  role="alert">
                <a class="alert-link" href="index.php?controller=comment&task=report&id=<?= $commentaire['id'] ?>" onclick="return window.confirm('Êtes vous sûr de vouloir signaler ce commentaire ?')">Signaler</a>
            </div>
            <?php } else { ?>
                <div class="alert alert-warning"  role="alert">
                <em>Ce commentaire a été signalé</em></br>
                    <?php if ($_SESSION['isAdmin'] ): ?>
                    <a href="index.php?controller=comment&task=moderate&id=<?= $commentaire['id'] ?>"">Annuler</a>
                    <?php endif;?>
            </div>
        <?php
            } 
                if ($_SESSION['isAdmin'] ): ?>
                    <a href="index.php?controller=comment&task=delete&id=<?= $commentaire['id'] ?>" onclick="return window.confirm('Êtes vous sûr de vouloir supprimer ce commentaire ?')">Supprimer le commentaire</a>
                <?php endif;?>
            </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>

    <form action="index.php?controller=comment&task=insert" method="POST">
    <div class="form-group">
        <h3>Vous en pensez quoi ?</h3>
        <div>
            <input type="text"  class="form-control" name="commentpseudo" placeholder="Votre pseudo">
        </div>
        <div>
            <textarea name="commenttext" id=""  class="form-control" cols="30" rows="10" placeholder="Votre commentaire..."></textarea>
            <input type="hidden" name="id" value="<?= $article_id ?>">
        </div>
        <div>
            </div>
            <button type="submit" class="btn btn-dark">Envoyer</button>
            </div>
    </form>

    </div>
<div>