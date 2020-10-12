<?php

namespace OpenClassrooms\Blog\Model;

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

    public function addComment($postId, $author, $comment)
    {
        $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function flagComment($commentId)
    {
        $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
        $signaledflag = $commentManager->signalFlag($commentId);
        $postController = new \OpenClassrooms\Blog\Model\PostController();
        $postController->post();
    }
}

