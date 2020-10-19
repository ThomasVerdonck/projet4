<?php $title = 'Jean Forteroche'; 
$css = 'style6.css';
?>

<?php ob_start(); ?>

<section class="row" id="section_admin">
	<div class="col-12">
		<h2>Espace Administration</h2>
		<br>
		<nav id="menu_admin">
	        <ul id="liste_admin">
	        	<li><a href="index.php?action=create_post">Créer un article</a></li>
	        	<li><a href="index.php?action=listAllPostsAdmin">Voir tous les articles</a></li>
	        	<li><a href="index.php?action=manageComments">Gérer les commentaires signalés</a></li>
	        </ul>		           	
	    </nav>
	</div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>