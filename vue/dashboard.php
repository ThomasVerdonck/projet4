<?php $title = 'Jean Forteroche'; 
$css = 'style6.css';
?>

<?php ob_start(); ?>

<section id="section_admin">
	<h2>Espace Admin</h2>
	<nav id="menu_admin">
        <ul id="liste_admin">
        	<li><a href="index.php?action=create_post">Créer un article</a></li>
        	<li><a href="index.php?action=listAllPosts">Voir tous les articles</a></li>
<!--Peut-on réutiliser la page Episodes.php?
Doit-on créer un bouton 'Voir l'article en entier' qui nous ramène sur une page par ex. single_post.php
(<a href="single_post.php?id=<?= $post['id'] ?>">) ?
Est-ce que cette dernière doit contenir un bouton 'Modifier l'article'?
Prévoir un bouton 'Supprimer cette article'.
Faut-il ajouter un if(isset($_SESSION['pseudo']) AND !empty($_SESSION['pseudo']))
-->
        	<li><a href="">Gérer les commentaires signalés</a></li>
        </ul>		           	
    </nav>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>