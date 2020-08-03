<?php $title = htmlspecialchars($post['posttitle']); ?>

<?php ob_start(); ?>
<div class="container">
<div class="news">
    <h3>
        <?= htmlspecialchars($post['posttitle']) ?>
        <!-- <em>le <?= $post['creation_date_fr'] ?></em> -->
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['posttext'])) ?>
    </p>
</div>

<h2>Commentaires</h2>



<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['commentpseudo']) ?></strong>
        <br /> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['commenttext'])) ?></p></br>
    <p><a href="index.php?action=flag&amp;id=<?= $post['postid'] ?>&amp;commentid=<?= $comment['commentid'] ?>"> Signaler</a></p>
<?php
}
?>

<h3>T'en penses quoi ?</h3>
<form action="index.php?action=addComment&amp;id=<?= $post['postid'] ?>" method="post">
    <div>
        <label for="author">Pseudo*</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire*</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" value="Envoyer"/>
    </div>
</form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
