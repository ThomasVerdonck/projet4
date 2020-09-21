<?php $title = 'Episodes'; 
$css = 'style3.css';
?>

<?php ob_start(); ?>
	    	
<h2>Tous les épisodes déja en ligne</h2>

<section id="last">
<?php 
while ($donnees = $allPosts->fetch())//la variable $lastPosts est automatiquement transmise par front_controller.php grâce au require
{
?>			
	<div class="all_posts">
		<figure class="figure">
			<img src="images/chiens_de_traineau.jpg" alt="paysage_Alaska">
		</figure>
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
$allPosts->closeCursor();
?>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>