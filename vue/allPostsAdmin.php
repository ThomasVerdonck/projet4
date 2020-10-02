<?php $title = 'Jean Forteroche'; 
$css = 'style7.css';
?>

<?php ob_start(); ?>

<section>
	<h2>Tous les chapitres</h2>
	<table>
		<thead>
			<tr>
				<th>Titre</th>
				<th>Contenu</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			while ($donnees = $allPosts->fetch()){
			?>			
				<tr>
					<td><?php echo htmlspecialchars($donnees['titre']); ?></td>
					<td><a class="btn btn-primary" href="<?php echo "index.php?action=suppChap&id=".$donnees['id']?>">Supprimer</a></td><!--Bouton Supprimer-->
					<td><a class="btn btn-primary" href="#">Modifier</a></td><!--Bouton Modifier-->
				</tr>					
			<?php
			}
			$allPosts->closeCursor();
			?>
		</tbody>
	</table>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>