<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://cdn.tiny.cloud/1/cfos1nec3uc2llda2z38zfjqrwqe6su7a9ld9xlnls6flfwg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<link rel="stylesheet" href="<?php echo $css;?>"/>
		<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css"/>
		<script>
	      tinymce.init({
	        selector: '#mytextarea'
	      });
    	</script>
		<title><?= $title ?></title>		
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<header class="col">					
					<nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
						<a class="navbar-brand" href="index.php?action=listLastPosts">Jean Forteroche</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div id="navbarSupportedContent" class="collapse navbar-collapse justify-content-end">
					        <ul class="navbar-nav">
				            	<li class="nav-item"><a class="nav-link" href="index.php?action=listLastPosts">Accueil</a></li>
				            	<li class="nav-item"><a class="nav-link" href="index.php?action=listAllPosts">Episodes</a></li>
				            	<li class="nav-item"><a class="nav-link" href="index.php?action=JeanForteroche">À propos</a></li>
				            	<?php 
				            	if (!isset($_SESSION['pseudo'])){ 
				            	?>
				            	<li class="nav-item"><a class="nav-link" href="index.php?action=connection">Connexion</a></li>
				            	<?php
				            	}
				            	else{ 
				            	?>		            		
				            		<li class="nav-item"><a class="nav-link" href="index.php?action=dashboard">Tableau de bord</a></li>
				            		<li class="nav-item"><a class="nav-link" href="index.php?action=disconnect">Déconnexion</a></li>
				            	<?php
				            	}
				            	?>
					        </ul>
					    </div>		           	
			        </nav>
			    </header>
		    </div>
		</div>
		
    	<div class="container mt-5 py-5">
			<?= $content ?>				
		</div>

		
		<div class="bg-light" id="bg-footer">
			<div class="container">			
				<div class="row pt-4 pb-3">
					<footer class="col">						
							<div id="footer_author"><p>Jean Forteroche</p>
							</div>
							<div id="conditions">
								<p id="merci">Merci de lire attentivement les conditions d'utilisation:</p>
								<p>Ce site a été produit et mis en ligne dans le cadre de la formation "développeur Web junior"
									dispensée par le site de formation en ligne <span id="openclass">OpenClassrooms</span>. Jean Forteroche est un personnage fictif. La photo utilisée dans la page "A propos" est une image libre de droit.</p>
							</div>						
					</footer>
				</div>				
			</div>
		</div>
		<!-- bibliothèques jQuery et Popper.js + bibliothèque JavaScript de Bootstrap -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>