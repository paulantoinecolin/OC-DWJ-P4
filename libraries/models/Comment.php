<?php

namespace Models;

class Comment extends Model
{
    protected $table = "comments";

    // !! findAllWithArticle() -> readAllFromPost()
    // !! $commentaires -> $comments
    // Return all Comments from one Article's ID
    public function findAllWithArticle(int $article_id): array
    {
        // We get one article's comments
        $query = $this->db->prepare("SELECT * FROM comments WHERE postid = :id");
        $query->execute(['id' => $article_id]);
        $commentaires = $query->fetchAll();

        return $commentaires;
    }

    // We write a new comment in the db by using the compact function of php
    public function insert(string $commentpseudo, string $commenttext, int $postid): int
    {
        $query = $this->db->prepare('INSERT INTO comments SET commentpseudo = :commentpseudo, commenttext = :commenttext, postid = :postid');
        $query->execute(compact('commentpseudo', 'commenttext', 'postid'));

        $lastInsertId = $this->db->lastInsertId();

        return $lastInsertId;
    }

    // We need a "Report a comment"
    public function report(int $id)
    {
        $query = $this->db->prepare('UPDATE comments SET commentflagged = !commentflagged WHERE id = :id');
        $report = $query->execute(['id' => $id]);

        return $report;
    }

    // This method is necessary for the admin only
    public function moderate(int $id)
    {
        $query = $this->db->prepare('UPDATE comments SET commentflagged = !commentflagged WHERE id = :id');
        $report = $query->execute(['id' => $id]);

        return $report;
    }
}
