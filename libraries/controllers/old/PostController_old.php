<?php

namespace controllers;

// Chargement des classes
require_once('../libraries/models/Post.php');
require_once('../libraries/models/Comment.php');

class PostController
{
    public function listPosts()
    {
        $Post = new \models\Post();
        $posts = $Post->getPosts();

        require('../views/articles/index.view.php');
    }

    public function post()
    {
        $Post = new \models\Post();
        $Comment = new \models\Comment();

        $post = $Post->getPost($_GET['id']);
        $comments = $Comment->getComments($_GET['id']);

        require('../views/articles/postView.php');
    }
}
