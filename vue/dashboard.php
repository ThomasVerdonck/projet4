<?php $title = 'Jean Forteroche'; 
$css = 'style6.css';
?>

<?php ob_start(); ?>

<section class="row" id="section_admin">
	<h2>Espace Admin</h2>
	<nav id="menu_admin">
        <ul id="liste_admin">
        	<li><a href="index.php?action=create_post">Créer un article</a></li>
        	<li><a href="index.php?action=listAllPostsAdmin">Voir tous les articles</a></li>
        	<li><a href="index.php?action=createPosts">Créer des articles</a></li>
        	<li><a href="">Gérer les commentaires signalés</a></li>
        </ul>		           	
    </nav>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>