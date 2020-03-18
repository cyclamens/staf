<?php $title = 'Inscription'; ?>
<?php ob_start(); ?>

<div id="inscription" align="center">
<h2>Inscription</h2>
<form method="POST" action="index.php?action=inscription">
	<table>
		<tr>
			<td align="right"><br>
				<label for="pseudo">Pseudo :</label>
			</td>
			<td><br>
				<input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" required />
                  </td>
			</td>
		</tr>
		<tr>	
			<td align="right"><br>
				<label for="mail">mail :</label>
			</td>
			<td><br>
				<input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" required />
			</td>
		</tr>
		<tr>	
			<td align="right"><br>
				<label for="mail2">Confirmation du mail :</label>
			</td>
			<td><br>
				<input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" required  />
			</td>
		</tr>
		<tr>	
			<td align="right"><br>
				<label for="mdp">Mot de passe :</label>
			</td>
			<td><br>
				<input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" required  >
			</td>
		</tr>
		<tr>	
			<td align="right"><br>
				<label for="mdp2">Confirmation du mot de passe :</label>
			</td>
			<td><br>
				<input type="password" placeholder="Confirmation du mdp" id="mdp2" name="mdp2" required  >
			</td>
		</tr>	
		<tr>
			<td></td>
			<td align="center"><br>
				<input type="submit" name="forminscription" value="S'inscrire">
				<a href="#">Se connecter</a>
			</td>
		</tr>
	</table>

</form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>