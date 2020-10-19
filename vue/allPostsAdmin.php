<?php $title = 'Liste de tous les articles'; 
$css = 'style7.css';
?>

<?php ob_start(); ?>

<p><a href="index.php?action=dashboard">Retour au Tableau de bord</a></p>

<h2>Tous les chapitres</h2>
<div class="table-responsive-sm mt-3">
	<table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th scope="col">Titre</th>
				<th scope="col">Supprimer</th>
				<th scope="col">Modifier</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			while ($donnees = $allPosts->fetch()){
			?>			
				<tr>
					<td><?php echo htmlspecialchars($donnees['titre']); ?></td>
					<td><a class="btn btn-primary" href="<?php echo "index.php?action=suppChap&id=".$donnees['id']?>">Supprimer</a></td>
					<td><a class="btn btn-primary" href="<?php echo "index.php?action=modifChap&id=".$donnees['id']?>">Modifier</a></td>
				</tr>
			<?php
			}
			$allPosts->closeCursor();
			?>
		</tbody>
	</table>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>