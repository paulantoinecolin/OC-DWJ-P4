<div class="container">
    <div class="news">    

    <form action="index.php?controller=article&task=update&id=<?= $article['id'] ?>" method="POST">
        <h1><?= $article['posttitle'] ?></h1>
        <div>
            <textarea name="posttitle" id="" cols="50" rows="1" placeholder=""><?= $article['posttitle'] ?></textarea>
        </div>
        <div>
            <textarea name="posttext" id="tiny" cols="50" rows="50" placeholder=""><?= $article['posttext'] ?></textarea>
            <input type="hidden" name="id" value="">
        </div>
        <div>
            <button>Publier</button>
            <a href="index.php?controller=article&task=index">Annuler</a>
            </div>
    </form>

    </div>
<div>

<script>
    tinymce.init({
        selector: '#tiny'
    });
</script>