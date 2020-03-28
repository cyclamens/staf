<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/inscriptionManager.php');
require_once('model/connexionManager.php');
function inscription()
{
    $inscriptionOk = new InscriptionManager();
    if(isset($_POST['forminscription'])) {      
        if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mail = htmlspecialchars($_POST['mail']);
            $mail2 = htmlspecialchars($_POST['mail2']);
            $mdp = ($_POST['mdp']);
            $mdp2 = ($_POST['mdp2']);
            $pseudolength = strlen($pseudo);
            if ($pseudolength <= 255) {
                if ($mail == $mail2) {
                    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        $pseudoOk = $inscriptionOk->reqPseudo($pseudo);
                        $mailOk = $inscriptionOk->reqMail($mail);
                        if ($mailOk->rowCount() == 0) {
                            if ($pseudoOk->rowCount() == 0) {
                                if ($mdp == $mdp2) {
                                    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                                    
                                    $inscriptionOk->inserMbr($pseudo, $mail, $mdp);
                                    
                                    header('Location: index.php?action=connexion');
                                }else{
                                    throw new Exception("Vos mots de passe ne correspondent pas !");   
                                }
                            }else{
                                throw new Exception("Pseudo déjà utilisé");  
                            }
                        }else{
                            throw new Exception("Adresse mail déjà utilisée !");  
                        }
                    }else{
                        throw new Exception("Votre adresse mail n'est pas valide !");   
                    }
                 }else{
                    throw new Exception("Vos adresses mail ne correspondent pas !");  
                 } 
            }else{
                throw new Exception("Votre pseudo ne doit pas dépasser 255 caractères !");   
            }
            
        }else{
            throw new Exception("Tous les champs doivent être complétés !");   
        }

    }
    
    require('view/frontend/inscription.php');
}

function login()
{
    $connexionOk = new ConnexionManager();

    if(isset($_POST['formconnexion'])) {
        $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
        $mdpconnect = ($_POST['mdpconnect']);
        if(!empty($pseudoconnect) AND !empty($mdpconnect)) {
            $userexist = $connexionOk->connexion($pseudoconnect); 
            if($userexist -> rowCount() == 1) {
                $userinfo = $userexist->fetch();
                $checkPass=password_verify($_POST['mdpconnect'], $userinfo['pass']);
                if ($checkPass) {
                    $_SESSION['pseudoconnect'] = $userinfo['pseudo'];
                    $_SESSION['idconnect'] = $userinfo['user_id'];
                    $_SESSION['adminconnect'] = $userinfo['admin'];
                    header("Location:index.php");
                }else{
                    throw new Exception("Mauvais mot de pass");  
                }
                    
            }else {
                throw new Exception("Mauvais pseudo !");
            }
                
        }else {
            throw new Exception("Tous les champs doivent être complétés !");
        }
    }

    require('view/frontend/connexion.php');
}

function deconnect()
{
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: index.php?action=connexion");
}

/*
function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager(); // Création d'un objet

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
*/
function home()
{
    require('view/frontend/accueil.php');
}