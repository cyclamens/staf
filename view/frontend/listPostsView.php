<?php $title = 'Les chapitres'; ?>

<?php ob_start(); ?>

<?php
while ($data = $posts->fetch())//affiche tous les chapitres
{
?>
    <div id="news">
        <h2>
            <?= $data['title'] ?> <br>
            <em> le <?= $data['creation_date_fr'] ?></em>
        </h2>
        <p>
            <?= nl2br($data['content']) ?>
            <br /><br>
            <a href="index.php?action=chapitre&amp;id=<?= $data['post_id'] ?>" class="btn btn-primary"><em>Commentaires</em></a>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>