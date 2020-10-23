<div class="jumbotron">
  <div class="container">
    <h1 class="display-4 font-weight-bold"">Jean Forteroche, écrivain sans histoires</h1>
    <p class="lead font-weight-bold font-italic">Chaque jour retrouvez un nouveau chapitre de mon livre</p>
  </div>
  </div>

<div class="container">
    <div class="news">    

    <form action="index.php?controller=article&task=insert" method="POST">
        <h3>Nouvel Article</h3>
        <div>
            <textarea name="posttitle" id="" cols="50" rows="1" placeholder="Titre de l'article"></textarea>
        </div>
        <div>
            <textarea name="posttext" id="tiny" cols="50" rows="50" placeholder="Contenu de l'article"></textarea>
            <input type="hidden" name="id" value="">
        </div>
        <div>
            <button>Publier</button>
            <a href="index.php?controller=article&task=index">Annuler</a>
            </div>
    </form>

    </div>
<div>