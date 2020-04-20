<?php
//chargement de la class Manager
require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)//Méthode qui récupére les commentaires d'un article
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT users.pseudo AS author, comments.comment AS content, comment_id, reported, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM users INNER JOIN comments ON users.user_id = comments.user_id WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function adminFlagComments()//Méthode qui récupére les commentaires signalés dans l'administrateur
    {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT users.pseudo AS author, comments.comment AS content, comment_id, reported, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM users INNER JOIN comments ON users.user_id = comments.user_id WHERE reported = 1 ORDER BY comment_date DESC');
        
        return $comments;
    }

    public function postComment($postId, $author, $comment)//récupére le commentaire envoyé par un auteur
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, user_id, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
    public function flagComment($commentId)//signale un commentaire particulier
    {
        $db = $this->dbConnect();
        $sql = $db->prepare('UPDATE comments SET reported = 1 WHERE comment_id = ?');
        $flag = $sql->execute(array($commentId));
        return $flag;
    }

    public function untagComment($commentId)//désignale un commentaire
    {
        $db = $this->dbConnect();
        $sql = $db->prepare('UPDATE comments SET reported = 0 WHERE comment_id = ?');
        $unflag = $sql->execute(array($commentId));
        return $unflag;
    }

    public function supprimComment($commentId)//supprime un commentaire
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE comment_id = ?');
        $req->execute(array($commentId));
        $comment = $req->fetch();

        return $comment;
    }

    
}