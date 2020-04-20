<?php $title = 'Modification chapitre'; ?>

<?php ob_start(); ?>

<h2>Rédaction</h2>
<?php if(isset($_SESSION['adminconnect']) && ($_SESSION['adminconnect'] == 1)): ?>
<!--formulaire qui permet de modifier un chapitre -->
	<form action="index.php?action=savepost&id=<?= $_GET['id']?>" method="post">
		<input type="text" name="article_title" placeholder="Titre" value="<?=$editChap['title']?>"><br>
		<textarea name="article_content" placeholder="Contenu du chapitre" class="tinymce">
			<?= nl2br($editChap['content']) ?>
		</textarea><br>
		<input type="submit" value="Envoyer l'article" class="btn btn-primary"/>
	</form>
<?php else:?>
	 <?php throw new Exception("Page réservée à l'administrateur");?>
<?php endif; ?>	  

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>