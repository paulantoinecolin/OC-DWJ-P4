<?php

namespace controllers;

// Chargement des classes
require_once('../libraries/models/Post.php');
require_once('../libraries/models/Comment.php');

class CommentController
{
    public function addComment($postId, $author, $comment)
    {
        $Comment = new \models\Comment();

        $affectedLines = $Comment->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function flagComment($commentId)
    {
        $Comment = new \models\Comment();
        $signaledflag = $Comment->signalFlag($commentId);
        $postController = new \controllers\PostController();
        $postController->post();
    }
}
