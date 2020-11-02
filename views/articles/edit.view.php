<div class="container">
    <div class="news">    

    <form action="index.php?controller=article&task=update&id=<?= $article['id'] ?>" method="POST">
        <h1><?= $article['posttitle'] ?></h1>
        <div>
            <textarea name="posttitle" id="" cols="50" rows="1" placeholder=""><?= $article['posttitle'] ?></textarea>
        </div>
        <div>
            <textarea name="posttext" id="tiny" cols="50" rows="20" placeholder=""><?= $article['posttext'] ?></textarea>
        </div>
        <div>
        <button type="submit" class="btn btn-dark">Publier</button>
        <a href="index.php?controller=article&task=index" class="btn btn-dark">Annuler</a>
            </div>
    </form>

    </div>
<div>

<?php if ($_SESSION['isAdmin']): ?>
    <script src="https://cdn.tiny.cloud/1/9fmszb44igwq5ax4mdmk1p0o75hgom6frjdv4um7iddv4uib/tinymce/5/tinymce.min.js" referrerpolicy="origin">
</script>
<script>
    tinymce.init({
        selector: '#tiny'
    });
</script>
<?php endif;?>