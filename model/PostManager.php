<?php
require_once("model/Manager.php");
class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT post_id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT post_id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE post_id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }


    public function supprimPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE post_id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function editPost($titre_chap ,$content_chap, $postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE post_id = ?');
        $req->execute(array($titre_chap, $content_chap, $postId));
        $post = $req->fetch();

        return $post;
    }

}