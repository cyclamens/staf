<?php
namespace OpenClassrooms\Blog\Model;
//chargement de la class Manager
require_once("model/Manager.php");

class InscriptionManager extends Manager
{
   public function reqMail($mail)
    {
        $db = $this->dbconnect();
        $reqmail = $db->prepare("SELECT * FROM users WHERE mail = ?");
        $reqmail->execute(array($mail));   
        return $reqmail;
    }

    public function reqPseudo($pseudo)
    {
        $db = $this->dbconnect();
        $reqpseudo = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
        $reqpseudo ->execute(array($pseudo));
        return $reqpseudo;
    }

    public function inserMbr($pseudo, $mail, $mdp)
    {
        $db = $this->dbConnect();
        $insermbr = $db->prepare("INSERT INTO users(pseudo, mail, pass) VALUES(?, ?, ?)");
        $insermbr->execute(array($pseudo, $mail, $mdp));
        return $insermbr;
    }
}