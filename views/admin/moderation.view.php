<div class="container">
    <div class="news">

    <h1>Dashboard - Gestion des Commentaires</h1>


    //TABLE ORDERED BY LAST ARTICLE THEN LAST COMMENT

    //  | Auteur  | Commentaire    | Article
    // —————————————————————————————————————————————————
    //  | Pseudo  | Texte + Date   | Titre
    //  |         | + Suppr/Unflag | + Lien vers article


    <?php if (count($commentaires) === 0) : ?>
        <?php foreach ($commentaires as $commentaire) : ?>
            <h3 class="#<?= $commentaire['id'] ?>">Commentaire de <?= $commentaire['commentpseudo'] ?></h3>
            <small>Le <?= $commentaire['commentcreationdate'] ?></small>
            <blockquote><?= $commentaire['commenttext'] ?></blockquote>

        <?php
            if (!$commentaire['commentflagged']) {
                ?>
            <div class="alert alert-danger"  role="alert">
                <a class="alert-link" href="index.php?controller=comment&task=report&id=<?= $commentaire['id'] ?>" onclick="return window.confirm('Êtes vous sûr de vouloir signaler ce commentaire ?')">Signaler</a>
            </div>
            <a href="index.php?controller=comment&task=delete&id=<?= $commentaire['id'] ?>" onclick="return window.confirm('Êtes vous sûr de vouloir supprimer ce commentaire ?')">Supprimer le commentaire</a>
        <?php endforeach ?>

    <?php endif ?>