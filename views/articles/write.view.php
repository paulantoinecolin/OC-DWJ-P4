<div class="container">
    <div class="news">    

    <form action="index.php?controller=article&task=insert" method="POST">
        <h3>Nouvel Article</h3>
        <div>
            <textarea name="posttitle" id="" cols="50" rows="1" placeholder="Titre de l'article"></textarea>
        </div>
        <div>
            <textarea name="posttext" id="" cols="50" rows="10" placeholder="Contenu de l'article"></textarea>
            <input type="hidden" name="id" value="">
        </div>
        <div>
            <button>Publier</button>
            </div>
    </form>

    </div>
<div>