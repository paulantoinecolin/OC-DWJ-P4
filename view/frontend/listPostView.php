<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Jean Forteroche, écrivain sans histoires</h1>
<p>Chaque jour retrouvez un nouveau chapitre de mon livre</p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="posts-container">
        <div class="post-content">
            <h3>
            <a href="index.php?action=post&amp;id=<?= $data['postid'] ?>"> <?= htmlspecialchars($data['posttitle']) ?></a>
            
            </h3>
            
            <p>
                <!-- <?= nl2br(htmlspecialchars($data['posttext'])) ?>
                <br /> -->
            
            </p>
        </div>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
