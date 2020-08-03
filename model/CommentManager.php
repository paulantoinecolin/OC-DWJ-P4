<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT commentid, commentpseudo, commenttext, commentflagged, DATE_FORMAT(commentcreationdate, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE postid = ? ORDER BY commentcreationdate DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(postid, commentpseudo, commenttext, commentcreationdate) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function toggleFlag($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment SET commentflagged = !commentflagged WHERE commentid = ?');
        $toggledflag = $req->execute(array($commentId));

        return $toggledflag;
    }
}