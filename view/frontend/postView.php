<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
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
    <p><strong><?= htmlspecialchars($comment['commentpseudo']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['commenttext'])) ?></p>
<?php
}
?>

<form action="index.php?action=addComment&amp;id=<?= $post['postid'] ?>" method="post">
    <div>
        <label for="author">pseudo *</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">commentaire *</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" value="Envoyer"/>
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
