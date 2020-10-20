<?php

namespace Models;

class Comment extends Model
{
    protected $table = "comments";

    // !! findAllWithArticle() -> readAllFromPost()
    // !! $commentaires -> $comments
    // Return all Comments from one Article's ID
    public function findAllWithArticle(int $article_id) : array
    {
        // Récupération des commentaires de l'article en question
        $query = $this->db->prepare("SELECT * FROM comments WHERE postid = :id");
        $query->execute(['id' => $article_id]);
        $commentaires = $query->fetchAll();

        return $commentaires;
    }

    // !! insertComment() -> create()
    // We write a new comment in the db by using the compact function of php
    public function insert(string $commentpseudo, string $commenttext, int $article_id) : void
    {
        $query = $this->db->prepare('INSERT INTO comments SET commentpseudo = :commentpseudo, commenttext = :commenttext, postid = :article_id, postcreatedate = NOW()');
        $query->execute(compact('commentpseudo', 'commenttext', 'id'));
    }

    // We will need a "flag a comment" method
    // We will need a "unflag a comment" method
}