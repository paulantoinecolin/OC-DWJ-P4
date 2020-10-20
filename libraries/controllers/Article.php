<?php

namespace Controllers;

class Article extends Controller
{

    protected $modelName = \Models\Article::class;

    public function index() {
        // Montrer la liste
        // $articles = $this->model->findAll("postcreatedate DESC");

        // Affichage
        $pageTitle = "Accueil";

        // Appel de la fonction render pour démarrer l'ob_start
        // en lui passant les variables grace à l'association
        // des fonctions "compact" et "extract" (on évite de faire un tableau)
        \Renderer::render('articles/index', compact('pageTitle', 'articles'));
    }

    public function show() {
        // Montrer un article
        $commentModel = new \Models\Comment();

        // On part du principe qu'on ne possède pas de param "id"
        $article_id = null;

        // Mais si il y'en a un et que c'est un nombre entier alors c'est cool
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id'];
        }

        // On peut desormais decider si erreur ou pas
        if (!$article_id) {
            die("Vous devez préciser un paramètre `id` dans l`URL !");
        }

        $article = $this->model->find($article_id);
        $commentaires = $commentModel->findAllWithArticle($article_id);

        // Affichage
        $pageTitle = $article['posttitle'];

        \Renderer::render('articles/show', compact('pageTitle', 'article', 'commentaires', 'article_id'));

    }

    public function delete() {
        // Supprimer un article
        // On vérifie que le GET possède bien un paramètre "id" (delete.php?id=202) et que c'est bien un nombre
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $id = $_GET['id'];

        // Vérification que l'article existe bel et bien
        $article = $this->model->find($id);
        
        $query = $db->prepare('SELECT * FROM posts WHERE id = :id');
        $query->execute(['id' => $id]);
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        // Réelle suppression de l'article
        $this->model->delete($id);

        // Redirection vers la page d'accueil
        \Http::redirect("index.php");
    }
}