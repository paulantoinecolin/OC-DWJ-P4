<?php

namespace Controllers;

class Comment extends Controller
{
    protected $modelName = \Models\Comment::class;
    
    public function insert()
    {
        // Insert un commentaire
        $articleModel = new \Models\Article();

        /**
         * 1. On vérifie que les données ont bien été envoyées en POST
         * D'abord, on récupère les informations à partir du POST
         * Ensuite, on vérifie qu'elles ne sont pas nulles
         */
        // On commence par l'author
        $commentpseudo = null;
        if (!empty($_POST['commentpseudo'])) {
            $commentpseudo = $_POST['commentpseudo'];
        }

        // Ensuite le contenu
        $commenttext = null;
        if (!empty($_POST['commenttext'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $commenttext = htmlspecialchars($_POST['commenttext']);
        }

        // Enfin l'id de l'article
        $id = null;
        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }

        // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
        // Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
        if (!$commentpseudo || !$commenttext || !$id) {
            die("Votre formulaire a été mal rempli !");
        }

        $article = $articleModel->find($id);
        if (!$article) {
            die("Ho ! L'article $id n'existe pas !");
        }

        // Insertion du commentaire
        $this->model->insert($commentpseudo, $commenttext, $id);

        // Redirection vers l'article en question
        \Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }

    public function delete()
    {
        // Supprime un commentaire
        // Récupération du paramètre "id" en GET
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }

        $id = $_GET['id'];

        // Vérification de l'existence du commentaire
        $commentaire = $this->model->find($id);
        if (!$commentaire) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        // Suppression réelle du commentaire
        // On récupère l'identifiant de l'article avant de supprimer le commentaire
        $article_id = $commentaire['article_id'];
        $this->model->delete($id);


        // Redirection vers l'article en question
        \Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }
}
