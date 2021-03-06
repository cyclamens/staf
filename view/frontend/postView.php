<?php ob_start(); ?>
       
<p><a href="index.php?action=listPosts">Retour à la liste des chapitres</a></p>
  
<div id="news">
    <h2><?= $post['title'] ?><br> <em> le <?= $post['creation_date_fr'] ?></em></h2>
    <p><?= nl2br($post['content']) ?></p>
</div>

<h3>Commentaires</h3>
<?php if(isset($_SESSION['pseudoconnect'])): ?>
    <div id="formcomment"><!--formulaire de saisi de commentaire -->
        <form action="index.php?action=addComment&amp;id=<?= $post['post_id'] ?>" method="post"  >      
            <textarea id="comment" name="comment" rows="10" cols="45" placeholder="Votre commentaire..."></textarea><br><br>
            <input type="submit" id="submit" value="Publier votre commentaire" class="btn btn-primary" />
        </form>
    </div>
<?php else:?>
<?php  echo '<strong style="color:blue; font-size:20px; background-color: #B3C6C7; width: 100%; heigth:100%; padding:5px;">Vous devez <a href="index.php?action=connexion" title="connectez-vous"><span style="color:red;">être connecté</span></a> pour poster un commentaire !</strong>'; ?> 
<?php endif; ?>
<?php
while ($comment = $comments->fetch())//affiche tous les commentaires postés
{
?>      
    <div id="postcomment"><strong><?= $comment['author']?></strong>  : <?= nl2br($comment['content']) ?>, le <?= $comment['comment_date_fr'] ?>
        <?php if(isset($_SESSION['pseudoconnect'])): ?>
            <a href="index.php?action=flagComment&amp;id=<?= $comment['comment_id']?>&amp;post_id=<?=$_GET['id'] ?>" id='signal'> 
        <?php if($comment['reported']==1){
            echo "Commentaire signalé";
        }?>
        <?php if($comment['reported']==0){
            echo"<span style=color:#5A53F4>Signaler le commentaire</span>";
        }?></a>
        <?php else:?>
        <?php endif; ?>
    </div>
<?php
}
$comments->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>