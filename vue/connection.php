<?php $title = 'Connexion'; 
$css = 'style5.css';
?>

<?php ob_start(); ?>
<section class="row" id="administration">
	<div class="col" id="connection_pic">
		<p id="admin">Espace réservé aux administrateurs</p>
	</div>
</section>

<section id="form">
	<h2>Connexion</h2>
	    <form action="index.php?action=connect" method="post">
	        <div class="labels">
	            <label for="pseudo">Pseudo</label><br />
	            <input type="text" id="pseudo" name="pseudo" required/>
	        </div>
	        <div class="labels">
	            <label for="password">Mot de passe</label><br />
	            <input type="password" class="password" name="password" required></input>
	        </div>
	        <div class="labels">
	            <label for="remember">Se souvenir de moi</label>
	            <input type="checkbox" id="remember" name="remember">
	        </div>
	        <div class="labels">
	            <input type="submit" name="submit" id="submit" value="Se connecter"/>
	        </div>
	    </form>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>



