<h1>Jean Forteroche, écrivain sans histoires</h1>

<?php foreach ($articles as $article) : ?>
    <h2><?= $article['posttitle'] ?></h2>
    <small>Ecrit le <?= $article['postcreatedate'] ?></small>
    <p><?= $article['posttext']?></p>
    <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Lire la suite</a>
    <a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
<?php endforeach ?>