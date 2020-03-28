<?php
session_start();
require('controller/frontend.php');

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'inscription') {
            
            inscription();
        }
        elseif ($_GET['action'] == 'connexion') {
            login();
        }
        elseif($_GET['action'] == 'deconnexion'){
            deconnect();
        }
        elseif ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
        
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }

        }
    }
    else {
        home();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    
    $messages = $e->getMessage();
    echo "<div style=\"font-family:Helvetica, Arial, sans-serif; font-size:20px; text-align:center; font-weight:bold; background-color: #B3C6C7; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 50%; color:red\">".$messages."</div>";

}
