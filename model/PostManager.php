<?php
namespace OpenClassrooms\Blog\Model;
//chargementde la class Manager
require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()//Méthode récupérant tous les articles
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT post_id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)//Méthode affichant un article en particulier
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT post_id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE post_id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }


    public function supprimPost($postId)//supprime un article
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE post_id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function editPost($titre_chap ,$content_chap, $postId)//modification d'un chapitre
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE post_id = ?');
        $req->execute(array($titre_chap, $content_chap, $postId));
        $post = $req->fetch();

        return $post;
    }

}