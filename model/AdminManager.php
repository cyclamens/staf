<?php
require_once("model/Manager.php");
class AdminManager extends Manager
{
    
    public function getComments()
    {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT users.pseudo AS author, comments.comment AS content, comment_id, reported, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM users INNER JOIN comments ON users.user_id = comments.user_id WHERE reported = 1 ORDER BY comment_date DESC');

        return $comments;
    }
    
}