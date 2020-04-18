<?php $title = 'Rédaction chapitres'; ?>

<?php ob_start(); ?>

	<h2>Rédaction</h2>
	<?php if(isset($_SESSION['adminconnect']) && ($_SESSION['adminconnect'] == 1)): ?>
	<form action="" method="post">
		
		<input type="text" name="article_title" placeholder="Titre"><br>
		<textarea name="article_content" placeholder="Contenu du chapitre" class="tinymce">
		</textarea><br>
		<input type="submit" value="Envoyer l'article" />
		
	</form>
	 <?php else:?>
	 	<?php throw new Exception("Page réservée à l'administrateur")
	 	;?>
	 <?php endif; ?>	  

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>