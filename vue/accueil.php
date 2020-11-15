<?php $title = 'Billet pour l\'Alaska'; 
$css = 'style.css';?>

<?php ob_start(); ?>
	<section id="first" class="row">
	    <div id="accueil" class="col">
	    	<img src="images/foret_Alaska.jpg" alt="image_accueil">
		</div>
		<div id="presentation">
			<h1>Billet simple pour l'Alaska</h1>
			<p>Découvrez le nouveau roman de Jean Forteroche.</p>
			<button id="aventure"><a href="index.php?action=listAllPosts">Partez à l'aventure</a></button>
		</div>
	</section>
	<h2>Dernières publications</h2>

	<section id="second" class="row mt-4">
	<?php 
	while ($donnees = $lastPosts->fetch())//la variable $lastPosts est automatiquement transmise par front_controller.php grâce au require
	{
	?>			
	    <div class="col-12 col-md-4">
	    	<div class="card mb-4 mb-lg-0" id="carte">
	    		<a href="index.php?action=showPost&id=<?php echo $donnees['id']?>"><img class="card-img-top" src="images/<?php echo $donnees['image']; ?>" alt="paysage_Alaska"></a>
      			<div class="card-body" id="card">
					<p class="card-text" id="date_post"><?php echo $donnees['creation_date_fr'];?></p>
					<h3 class="card-title">Billet simple pour l'Alaska</h3>
					<h4 class="card-title"><?php echo $donnees['titre'];?></h4>
					<p class="card-text"><?php echo substr($donnees['contenu'], 0, 120);?></p>						
					<p id="btn"><a href="index.php?action=showPost&id=<?php echo $donnees['id']?>" class="show_more">Découvrir</a>						
					</p>
				</div>
			</div>
		</div>				
	<?php
	}
	$lastPosts->closeCursor();
	?>
	</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
