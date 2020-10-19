<?php $title = 'Connexion'; 
$css = 'style8.css';
?>

<?php ob_start(); ?>
<section class="row">
	<div class="col">
        <p><a href="index.php?action=dashboard">Retour au Tableau de bord</a></p>
		<p id="admin">Espace réservé aux administrateurs</p>
	</div>
</section>

<section class="row">
	<div class="col" class="border-primary">
        <h2>Modifier un article</h2>   
        <form action="index.php?action=updateChap" method="post">
            <div class="form-group">
                <label for="title">Titre*</label><br />
                <input type="text" class="form-control" name="title" value="<?php echo $modifChap['titre']; ?>"/>
            </div>  
            <div class="form-group">
                <label for="content">Contenu*</label><br />
                <textarea class="form-control" id="mytextarea" name="content"><?php echo $modifChap['contenu']; ?></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo $modifChap['id']; ?>"/>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="submit" value="Mettre à jour"/>
            </div>
        </form>
    </div>    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>



