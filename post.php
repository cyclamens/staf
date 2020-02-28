<?php
require('model.php');

if (isset($_GET['posts']) && $_GET['posts'] > 0) {
    $post = getPost($_GET['posts']);
    $comments = getComments($_GET['posts']);
    require('postView.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}


