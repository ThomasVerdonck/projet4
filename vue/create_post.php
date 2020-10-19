<?php $title = 'Connexion'; 
$css = 'style8.css';
?>

<?php ob_start(); ?>
<section class="row">
	<div class="col">
		<p id="admin">Espace réservé aux administrateurs</p>
        <p><a href="index.php?action=dashboard">Retour au Tableau de bord</a></p>
	</div>
</section>

<section class="row">
	<div class="col" class="border-primary">
        <h2>Ajouter un article</h2>
        <p id="form_title">*Tous les champs sont obligatoires</p>    
        <form action="index.php?action=addChap" method="post">
            <div class="form-group">
                <label for="title">Titre*</label><br />
                <input type="text" class="form-control" name="title" required/>
            </div>
            <div class="form-group">
                <label for="content">Contenu*</label><br />
                <textarea class="form-control" id="mytextarea" name="content"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="submit" value="Ajouter"/>
            </div>
        </form>
    </div>    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>



