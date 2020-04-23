<?php
namespace OpenClassrooms\Blog\Model;
//permet la connexion à la base de données
class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=id13360865_blog_ecrivain;charset=utf8', 'id13360865_taf', 'Diamboulou-83');
        return $db;
    }
}