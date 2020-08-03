<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
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

// postPosts();