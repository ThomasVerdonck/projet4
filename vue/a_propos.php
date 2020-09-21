<?php $title = 'Jean Forteroche'; 
$css = 'style4.css';
?>

<?php ob_start(); ?>

<h2>Qui suis-je?</h2>

<div id="presentation">
	<p>Grand adepte d'alpinisme, Jean Forteroche est aussi un acteur et écrivain français. 
		Son premier roman, "Les neiges d'été" (Editions Pocket), s'est vendu à plus d'un trois cent mille 
		exemplaires dans le monde et a été traduit en plus de 15 langues. Depuis, il a écrit <span class="books">
		"Le paradis du Nord"</span> (2010), <span class="books">"L'appel de la montagne"</span> (2012) et <span 
		class="books">"L'étranger d'ici"</span> (2014), qui ont tous été publiés dans le monde 
		entier. <span class="books">"Billet simple pour l'Alaska"</span> est, pour lui, un hommage rendu aux peuples autochtones qu'il a pu 
		rencontrer au cours de ses nombreuses excursions dans les terres du Soleil de Minuit.</p>
</div>

<div id="photo">
	<img src="images/ecrivain.jpg" alt="jean_forteroche">
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>