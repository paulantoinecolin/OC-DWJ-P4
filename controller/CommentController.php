<?php

namespace OpenClassrooms\Blog\Controller;

// Chargement des classes
require_once('../model/PostManager.php');
require_once('../model/CommentManager.php');

class CommentController
{
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
        $postController = new \OpenClassrooms\Blog\Controller\PostController();
        $postController->post();
    }
}
