<?php

namespace OpenClassrooms\Blog\Controller;

// Chargement des classes
require_once('../libraries/models/PostManager.php');
require_once('../libraries/models/CommentManager.php');

class PostController
{
    public function listPosts()
    {
        $postManager = new \OpenClassrooms\Blog\Model\PostManager();
        $posts = $postManager->getPosts();

        require('../views/frontend/listPostView.php');
    }

    public function post()
    {
        $postManager = new \OpenClassrooms\Blog\Model\PostManager();
        $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('../views/frontend/postView.php');
    }
}
