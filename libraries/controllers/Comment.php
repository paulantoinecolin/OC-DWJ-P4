<?php

namespace Controllers;

class Comment extends Controller
{
    protected $modelName = \Models\Comment::class;
    
    // Insert a comment
    public function insert()
    {
        // we check the form datas in POST and that they are not null

        // first the author
        $commentpseudo = null;
        if (!empty($_POST['commentpseudo'])) {
            $commentpseudo = htmlspecialchars($_POST['commentpseudo']);
        }

        // then the content
        $commenttext = null;
        if (!empty($_POST['commenttext'])) {
            // we take care of security
            $commenttext = htmlspecialchars($_POST['commenttext']);
        }

        // then the post id
        $id = null;
        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }

        // last global check
        if (!$commentpseudo || !$commenttext || !$id) {
            die("Votre formulaire a été mal rempli !");
        }

        $articleModel = new \Models\Article();
        
        $article = $articleModel->find($id);
        if (!$article) {
            die("Ho ! L'article $id n'existe pas !");
        }

        // we insert the comment
        $comment_id = $this->model->insert($commentpseudo, $commenttext, $id);

        \Http::redirect("index.php?controller=article&task=show&id=" . $id. "#comment" . $comment_id);
    }

    // delete a comment
    public function delete()
    {
        User::isAdmin();
        // we catch the "id" param in GET
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }

        $id = $_GET['id'];

        // we check if comment exists
        $commentaire = $this->model->find($id);
        if (!$commentaire) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        // firt we catch the post id
        // then we delete the comment in db
        $article_id = $commentaire['postid'];
        $this->model->delete($id);

        \Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }

    public function report()
    {
        // we catch the "id" param in GET
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }

        $id = $_GET['id'];

        // we check if comment exists
        $commentaire = $this->model->find($id);
        if (!$commentaire) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        // firt we catch the post id
        // then we delete the comment in db
        $article_id = $commentaire['postid'];
        $this->model->report($id);

        \Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }
    
    // This method is necessary for the admin only
    public function moderate()
    {
        User::isAdmin();
        // we catch the "id" param in GET
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }

        $id = $_GET['id'];

        // we check if comment exists
        $commentaire = $this->model->find($id);
        if (!$commentaire) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        // firt we catch the post id
        // then we delete the comment in db
        $article_id = $commentaire['postid'];
        $this->model->moderate($id);

        \Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }
}
