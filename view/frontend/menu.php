<div id="header">
    		<h2 id="logo">jean forteroche</h2>
    		<input type="checkbox" id="chk">
    		<label for="chk" id="show-menu-btn">
    			<i class="fas fa-bars"></i>
    		</label>

    		<ul id="menu">
    			
                <?php if (isset($_SESSION['pseudoconnect'])): ?>
                    <a href="index.php?action=deconnexion">Déconnexion</a>
                <?php else :?>
                    <a href="index.php">Accueil</a>
                    <a href="#">Articles</a>
                    <a href="index.php?action=inscription">Inscription</a>
                    <a href="index.php?action=connexion">Connexion</a>
    			     <label for="chk" id="hide-menu-btn">
                        <i class="fas fa-times"></i>
    		          </label>	
                <?php endif; ?>      		
    		</ul>
</div>