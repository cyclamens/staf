<?php
require_once("model/Manager.php");
class InscriptionManager extends Manager
{
   public function Inscription()
   {
        
        if(isset($_POST['forminscription'])) {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mail = htmlspecialchars($_POST['mail']);
            $mail2 = htmlspecialchars($_POST['mail2']);
            $mdp = password_hash($_POST['mdp']);
            $mdp2 = password_hash($_POST['mdp2']);
            if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
                $pseudolength = strlen($pseudo);
                if($pseudolength <= 255) {
                    if($mail == $mail2) {
                        if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                            $db = $this->dbConnect();
                            $reqpseudo = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
                            $reqpseudo ->execute(array($pseudo));
                            $pseudoexist = $reqpseudo->rowCount();
                            $reqmail = $db->prepare("SELECT * FROM users WHERE mail = ?");
                            $reqmail->execute(array($mail));
                            $mailexist = $reqmail->rowCount();
                            if ($pseudoexist == 0) {
                                if($mailexist == 0) {
                                    if($mdp == $mdp2) {
                                        $db = $this->dbConnect();
                                        $insertmbr = $db->prepare("INSERT INTO users(pseudo, mail, password) VALUES(?, ?, ?)");
                                        $insertmbr->execute(array($pseudo, $mail, $mdp));
                                    
                                        throw new Exception("Votre compte a bien été créé ! <a href=\"index.php\">Se connecter</a>");
                                    }else {
                                        throw new Exception("Vos mots de passes ne correspondent pas !");
                                    }
                                }else {
                                    throw new Exception("Adresse mail déjà utilisée !");
                                }    
                            }else{
                                throw new Exception("pseudo déjà utilisé");    
                            }
                        }else {
                            throw new Exception("Votre adresse mail n'est pas valide !");
                        }
                    }else {
                        throw new Exception("Vos adresses mail ne correspondent pas !");
                    }
                }else {
                    throw new Exception("Votre pseudo ne doit pas dépasser 255 caractères !");
                }
            }else {
                throw new Exception("Tous les champs doivent être complétés !");
            }
        }
    
    }
}