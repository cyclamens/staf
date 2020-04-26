<?php $title = 'Administrateur'; ?>

<?php ob_start(); ?>
<div id="admin">
    <strong>Page de rédaction des articles :</strong><button><a href="index.php?action=redaction">REDACTION DES ARTICLES</a>
    </button><br><br>
    <div id="flagcomment"> 
        <?php
        while ($data = $posts->fetch())//affiche les chapitres dans l'admin
        {
        ?>
            <h3>
                <strong><?= $data['title'] ?></strong>
                <em>le <?= $data['creation_date_fr'] ?></em>
                <a href="index.php?action=modifChapitre&id=<?=$data['post_id'] ?>" title="Modifier le chapitre" >Modifier</a>
                <a href="index.php?action=supprimeChapitre&id=<?=$data['post_id'] ?>" title="Supprimer le chapitre" class="supprim">Supprimer</a>
            </h3>    
        
        <?php
        }
        $posts->closeCursor();
        ?>

        <?php
        while ($comment = $flagComments->fetch())//affiche les commentaires signalés dans l'admin
        {
        ?>      
            <div id="postcomment"><strong><?= $comment['author']?></strong>  : <?= nl2br($comment['content']) ?>, le <?= $comment['comment_date_fr'] ?>
                <a href="index.php?action=designal&id=<?=$comment['comment_id'] ?>" title="Désignaler le commentaire">Désignaler</a>
                <a href="index.php?action=supprimeComment&id=<?=$comment['comment_id'] ?>" title="Supprimer le commentaire" class="supprim" >Supprimer</a>

            </div>
        <?php
        }
        $flagComments->closeCursor();
        ?>

    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>