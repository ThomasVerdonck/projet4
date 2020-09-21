<!DOCTYPE>
<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="<?php echo $css;?>"/>
		<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css"/>
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<title><?= $title ?></title>		
	</head>
	<body>
		<header>
			<div id="en_tete">
				<a href="index.php?action=listLastPosts" id="author_name">
					<p>Jean Forteroche</p>
				</a>
				<nav id="menu">
			        <ul>
		            	<li><a href="index.php?action=listLastPosts">Accueil</a></li>
		            	<li><a href="index.php?action=listAllPosts">Episodes</a></li>
		            	<li><a href="index.php?action=JeanForteroche">A propos</a></li>
		            	<li><a href="index.php?action=connection">Connexion</a></li>
		            	<?php 
		            	if (isset($_SESSION['pseudo'])){ 
		            	?>		            		
		            		<li><a href="index.php?action=dashboard">Tableau de bord</a></li>
		            		<li><a href="index.php?action=disconnect">Déconnexion</a></li>
		            	<?php
		            	}
		            	?>
			        </ul>		           	
		        </nav>
		    </div>
	    </header>

	    <main>
	    	<?= $content ?>
		</main>
		<footer>
			<div id="pied_page">
				<div id="footer_author"><p>Jean Forteroche</p>
				</div>
				<div id="conditions">
					<p id="merci">Merci de lire attentivement les conditions d'utilisation:</p>
					<p>Ce site a été produit et mis en ligne dans le cadre de la formation "développeur Web junior"
						dispensée par le site de formation en ligne OpenClassrooms. Jean Forteroche est un personnage fictif. La photo utilisée dans la page "A propos" est une image libre de droit.</p>
				</div>
			</div>
		</footer>
	</body>
</html>