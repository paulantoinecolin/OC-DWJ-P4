<div class="container">
    <div class="news">

    <h1><?= $article['posttitle'] ?></h1>
        <small>Ecrit le <?= $article['postcreatedate'] ?></small>
    <hr>
    <?= $article['posttext'] ?>

    <?php if (count($commentaires) === 0) : ?>
        <h2>Il n'y a pas encore de commentaires pour cet article...</h2>
    <?php else : ?>
        <h2>Il y a déjà <?= count($commentaires) ?> réactions : </h2>
        <?php foreach ($commentaires as $commentaire) : ?>
            <h3>Commentaire de <?= $commentaire['commentpseudo'] ?></h3>
            <small>Le <?= $commentaire['commentcreationdate'] ?></small>
            <blockquote>
                <em><?= $commentaire['commenttext'] ?></em>
            </blockquote>
            <a href="index.php?controller=comment&task=delete&id=<?= $commentaire['id'] ?>" onclick="return window.confirm('Êtes vous sûr de vouloir supprimer ce commentaire ?')">Supprimer</a>

        <?php
            if (!$commentaire['commentflagged']) {
                ?>
            <div class="alert alert-danger"  role="alert">
                <a class="alert-link" href="index.php?controller=comment&task=report&id=<?= $commentaire['id'] ?>" onclick="return window.confirm('Êtes vous sûr de vouloir signaler ce commentaire ?')">Signaler ce commentaire</a>
            </div>
            <?php
            } else {
                ?>
                <div class="alert alert-warning"  role="alert">
                <em>Ce commentaire a été signalé</em></br>
            </div>
    <?php
            } ?>
        <?php endforeach ?>

    <?php endif ?>

    

    <form action="index.php?controller=comment&task=insert" method="POST">
        <h3>Vous en pensez quoi ?</h3>
        <div>
            <input type="text" name="commentpseudo" placeholder="Votre pseudo">
        </div>
        <div>
            <textarea name="commenttext" id="" cols="30" rows="10" placeholder="Votre commentaire..."></textarea>
            <input type="hidden" name="id" value="<?= $article_id ?>">
        </div>
        <div>
            <button>Envoyer</button>
            </div>
    </form>

    </div>
<div>