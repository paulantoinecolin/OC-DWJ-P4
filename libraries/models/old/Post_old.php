<?php

namespace models;

require_once("../libraries/models/Database.php");

class Post extends Database
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT postid, posttitle, posttext, DATE_FORMAT(postcreatedate, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post ORDER BY postcreatedate');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT postid, posttitle, posttext, DATE_FORMAT(postcreatedate, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post WHERE postid = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
}
