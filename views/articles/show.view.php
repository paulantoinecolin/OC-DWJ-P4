<div class="container">
    <div class="news">

        <div class="card border-dark" style="width: 100%;">
            <div class="card-body">
                <h2 class="card-title"><?= $article['posttitle'] ?></h2>
                <small><em>Ecrit le <?= $article['postcreatedate'] ?></em></small></br>
                <hr>
                <p class="card-text"><?= html_entity_decode($article['posttext']) ?></p>
                <?php if ($_SESSION['isAdmin']) : ?>
                    <a href="index.php?controller=article&task=edit&id=<?= $article['id'] ?>" class="btn btn-outline-secondary"><img src="../svg/pencil-square.svg" alt="" width="24" height="24" title="pencil-square"></a>
                    <a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)" class="btn btn-outline-secondary"><img src="../svg/trash.svg" alt="" width="24" height="24" title="trash"></a>
                <?php endif; ?>
            </div>
        </div>

        <div class="card-comments">
            <?php if (count($commentaires) === 0) : ?>
                <h3>Il n'y a pas encore de commentaires pour cet article...</h3>
            <?php else : ?>
                <h4>Il y a déjà <?= count($commentaires) ?> réactions</h4>
                <?php foreach ($commentaires as $commentaire) : ?>
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 id="comment<?= $commentaire['id'] ?>" class="card-title"><?= $commentaire['commentpseudo'] ?></h5>
                            <small><em><?= $commentaire['commentcreationdate'] ?></small></em>
                            <blockquote><?= $commentaire['commenttext'] ?></blockquote>

                            <?php if (!$commentaire['commentflagged']) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <a class="alert-link" href="index.php?controller=comment&task=report&id=<?= $commentaire['id'] ?>" onclick="return window.confirm('Êtes vous sûr de vouloir signaler ce commentaire ?')">Signaler</a>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-warning" role="alert">
                                    <em>Commentaire signalé</em></br>
                                </div>
                                <?php if ($_SESSION['isAdmin']) : ?>
                                    <a href="index.php?controller=comment&task=moderate&id=<?= $commentaire['id'] ?>" class="btn btn-outline-secondary"><img src="../svg/hand-thumbs-up.svg" alt="" width="24" height="24" title="hand-thumbs-up"></a>
                                <?php endif; ?>
                            <?php
                            }
                            if ($_SESSION['isAdmin']) : ?>
                                <a href="index.php?controller=comment&task=delete&id=<?= $commentaire['id'] ?>" onclick="return window.confirm('Êtes vous sûr de vouloir supprimer ce commentaire ?')" class="btn btn-outline-secondary"><img src="../svg/trash.svg" alt="" width="24" height="24" title="trash"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>

        <form action="index.php?controller=comment&task=insert" method="POST">
            <div class="form-group">
                <h3>Vous en pensez quoi ?</h3>
                <div>
                    <input type="text" class="form-control" name="commentpseudo" placeholder="Votre pseudo">
                </div>
                <div>
                    <textarea name="commenttext" id="" class="form-control" cols="30" rows="10" placeholder="Votre commentaire..."></textarea>
                    <input type="hidden" name="id" value="<?= $article_id ?>">
                </div>
                <div>
                </div>
                <button type="submit" class="btn btn-dark">Envoyer</button>
            </div>
        </form>

    </div>
    <div>