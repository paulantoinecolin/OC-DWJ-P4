    <div class="container">
        <h1>Jean Forteroche, écrivain sans histoires</h1>
        <p><em>Chaque jour retrouvez un nouveau chapitre de mon livre</em></p>
 
    <?php
    while ($data = $posts->fetch()) {
        ?>  

        <div class="posts-container">
            <div class="post-content">
                <h3>
                    <a href="index.php?action=post&amp;id=<?= $data['postid'] ?>"><?= htmlspecialchars($data['posttitle']) ?></a>
                </h3>
                <p>
                    <?= nl2br(htmlspecialchars(excerpt($data['posttext']))) . "..." ?>
                </p>
            </div>
        </div>

    <?php
    }
    $posts->closeCursor();
    ?>
    </div>
