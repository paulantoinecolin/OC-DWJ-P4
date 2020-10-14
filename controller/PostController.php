<?php

namespace OpenClassrooms\Blog\Controller;

// Chargement des classes
require_once('../model/PostManager.php');
require_once('../model/CommentManager.php');

class PostController
{
    public function listPosts()
    {
        $postManager = new \OpenClassrooms\Blog\Model\PostManager();
        $posts = $postManager->getPosts();

        require('../view/frontend/listPostView.php');
    }

    public function post()
    {
        $postManager = new \OpenClassrooms\Blog\Model\PostManager();
        $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('../view/frontend/postView.php');
    }
}
