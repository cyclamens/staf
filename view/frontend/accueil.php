<?php $title = 'Accueil'; ?>
<?php ob_start(); ?>
<h1>BIENVENUE SUR LE BLOG DE JEAN FORTEROCHE!</h1>
<p>Sur ce blog, vous pourrez trouver les articles et les commentaires de la communauté. Vous pourrez également partager vos impressions et vos avis sur chaque article de mon livre. En tout cas, je compte sur vous, afin de voir l'avancée de mon roman en direct. 
<strong>Bonne lecture.</strong></p>

<div class="banner">
	<img src="public/image/ordi.jpg" alt="Bureau avec ordinateur">
	<h2 class="heading">BILLET SIMPLE POUR L'ALASKA</h2>
	<a href="index.php?action=listPosts">Voir les chapitres</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>