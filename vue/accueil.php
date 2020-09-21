<?php $title = 'Billet pour l\'Alaska'; 
$css = 'style.css';
?>

<?php ob_start(); ?>
	<section id="first">
	    <div id="accueil">
	    	<img src="images/foret_Alaska.jpg" alt="image_accueil">
		</div>
		<div id="presentation">
			<h2 id="title_book">Billet simple pour l'Alaska</h2>
			<p>Découvrez le nouveau roman de Jean Forteroche.</p>
			<button id="aventure"><a href="index.php?action=listAllPosts">Partez à l'aventure</a></button>
		</div>
	</section>
	<h2>Dernières publications</h2>

	<section id="second">
	<?php 
	while ($donnees = $lastPosts->fetch())//la variable $lastPosts est automatiquement transmise par front_controller.php grâce au require
	{
		//var_dump($donnees);
		//die();
	?>			
	    <div class="last_posts">
	    	<div class="img_posts">
	    		
	    			<img src="images/chiens_de_traineau.jpg" alt="paysage_Alaska">
	    	</div>	
			<aside class="start_of_post">
				<p id="date_post"><?php echo $donnees['creation_date_fr'];?></p>
				<h3 class="title_post">Billet simple pour l'Alaska</h3>
				<p class="title_chapter"><?php echo $donnees['titre'];?></p>
				<p class="start_of_content"><?php echo $donnees['contenu'];?></p>
				<p class="decouvrir">
					<a href="index.php?action=showPost&id=<?php echo $donnees['id']?>" class="show_more">Découvrir</a>
				</p>
			</aside>
		</div>
				
	<?php
	}
	$lastPosts->closeCursor();
	?>
	</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
