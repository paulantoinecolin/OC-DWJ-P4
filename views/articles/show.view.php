<h1><?= $article['posttitle'] ?></h1>
<small>Ecrit le <?= $article['postcreatedate'] ?></small>
<hr>
<?= $article['posttext'] ?>

<?php if (count($commentaires) === 0) : ?>
    <h2>Il n'y a pas encore de commentaires pour cet article ... SOYEZ LE PREMIER ! :D</h2>
<?php else : ?>
    <h2>Il y a déjà <?= count($commentaires) ?> réactions : </h2>
    <?php foreach ($commentaires as $commentaire) : ?>
        <h3>Commentaire de <?= $commentaire['commentpseudo'] ?></h3>
        <small>Le <?= $commentaire['commentcreationdate'] ?></small>
        <blockquote>
            <em><?= $commentaire['commenttext'] ?></em>
        </blockquote>
        <a href="index.php?controller=comment&task=delete&id=<?= $commentaire['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer</a>
    <?php endforeach ?>
<?php endif ?>

<form action="index.php?controller=comment&task=insert" method="POST">
    <h3>Vous voulez réagir ? N'hésitez pas les bros !</h3>
    <input type="text" name="commentpseudo" placeholder="Votre pseudo !">
    <textarea name="commenttext" id="" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea>
    <input type="hidden" name="id" value="<?= $article_id ?>">
    <button>Commenter !</button>
</form>