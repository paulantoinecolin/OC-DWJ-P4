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
}
