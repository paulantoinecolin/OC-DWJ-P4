<?php

namespace Models;

class Article extends Model
{
    protected $table = "posts";

    // We write a new article in the db by using the compact function of php
    public function insert(string $posttitle, string $posttext) : int
    {
        $query = $this->db->prepare('INSERT INTO posts SET posttitle = :posttitle, posttext = :posttext');
        $query->execute(compact('posttitle', 'posttext'));

        $lastInsertId = $this->db->lastInsertId();

        return $lastInsertId;
    }

    public function update(string $posttitle, string $posttext, int $id)
    {
        $query = $this->db->prepare('UPDATE posts SET posttitle = :posttitle, posttext = :posttext WHERE id = :id');
        $query->execute(compact('posttitle', 'posttext', 'id'));
    }

    public function findAllReportedWithArticle() : array
    {
        // Récupération des commentaires de l'article en question
        $results = $this->db->query("SELECT comments.id as comments_id, comments.commenttext, comments.commentpseudo,comments.commentcreationdate, posts.id, posts.posttitle as title FROM posts INNER JOIN comments on comments.postid = posts.id WHERE commentflagged = 1 ORDER BY postid ASC");
        $comments = $results->fetchAll();

        return $comments;
    }
}