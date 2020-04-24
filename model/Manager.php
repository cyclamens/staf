<?php
namespace OpenClassrooms\Blog\Model;
//permet la connexion à la base de données
class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blog_ecrivain;charset=utf8', 'root', '');
        return $db;
    }
}