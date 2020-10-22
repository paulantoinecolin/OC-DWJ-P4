<?php

namespace Controllers;

class Article extends Controller
{
    protected $modelName = \Models\Article::class;

    // Display all posts in index.php
    public function index()
    {
        // find all articles in db and order by desc date
        $articles = $this->model->findAll("postcreatedate DESC");

        // view title
        $pageTitle = "Accueil";

        // render the view for the ob_start
        // use compact/extract functions to alternate between an array and variables
        \Renderer::render('articles/index', compact('pageTitle', 'articles'));
    }

    // Display one post and its comments
    public function show()
    {
        
        // let's say we don't have a param "id"
        $article_id = null;
        
        // but if there is one and it's an int we use it
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id'];
        }

        // then we can decide for an error or not
        if (!$article_id) {
            die("Vous devez préciser un paramètre `id` dans l`URL !");
        }
        
        $article = $this->model->find($article_id);
        $commentModel = new \Models\Comment();
        $commentaires = $commentModel->findAllWithArticle($article_id);

        // view title
        $pageTitle = $article['posttitle'];

        \Renderer::render('articles/show', compact('pageTitle', 'article', 'commentaires', 'article_id'));
    }

    public function write()
    {
        \Renderer::render('articles/write');
    }

    // Insert a new post
    public function insert()
    {
        // we check the form datas in POST and that they are not null

        // first the title
        $posttitle = null;
        if (!empty($_POST['posttitle'])) {
            // we take care of security
            $posttitle = htmlspecialchars($_POST['posttitle']);
        }

        // then the content
        $posttext = null;
        if (!empty($_POST['posttext'])) {
            // we take care of security
            $posttext = htmlspecialchars($_POST['posttext']);
        }

        // last global check
        // if (!$posttitle|| $posttext) {
        //     die("Votre formulaire a été mal rempli !");
        // }

        $article_id = $this->model->insert($posttitle, $posttext);
        

        \Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }


    // delete one post
    public function delete()
    {
        // we check that GET does have an "id" param & int => delete.php?id=202
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $id = $_GET['id'];

        // we check that the post exists
        $article = $this->model->find($id);
        
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        // we remove the article in the db
        $this->model->delete($id);

        \Http::redirect("index.php");
    }
}
