<?php $title = $post['titre']; ?>

<?php $css = 'style2.css'; ?>

<?php ob_start(); ?>

<h1 id="title_book">Billet simple pour l'Alaska</h1>

<p><a href="index.php?action=listLastPosts">Retour à l'accueil</a></p> 

<div id="chapter">
    <h2>
        <?php echo htmlspecialchars($post['titre']); ?><br>
    </h2>    
    <h3><em>le <?php echo htmlspecialchars($post['creation_date_fr']); ?></em>
    </h3>

    <figure>
        <img src="images/chiens_de_traineau.jpg" alt="paysage_Alaska">
    </figure>
    
    <p id="content">
    <?php
    echo nl2br(htmlspecialchars($post['contenu']));//Il faut utiliser Tiny..
    ?>
    </p>
</div>

<h2>Commentaires</h2>

<section id="comments">
<?php
// Affichage des commentaires
//var_dump($comments);
//die;
while ($comment = $comments->fetch()){
?>
    <div class="comments">
        <p class="comment_author"><?php echo htmlspecialchars($comment['auteur']); ?></p>
        <p class="comment_date">le <?php echo htmlspecialchars($comment['date_commentaire_fr']); ?></p>
        <p><?php echo nl2br(htmlspecialchars($comment['commentaire'])); ?></p>
        <button type="submit" name="signal_comment" class="signal_button">Signaler ce commentaire</button>
    </div>
    <hr>
<?php
} 
$comments->closeCursor();// Fin de la boucle des commentaires
?>
</section>

<!-- Formulaire pour ajouter un commentaire-->
<section id="add_comment">
    <h2>Ajouter un commentaire</h2>
    <p id="form_title">*Tous les champs sont obligatoires</p>
    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="author">Pseudo*</label><br />
            <input type="text" id="author" name="author" required/>
        </div>
        <div>
            <label for="comment">Commentaire*</label><br />
            <textarea id="comment" name="comment" required></textarea>
        </div>
        <div>
            <input type="submit" id="submit" value="Envoyer"/>
        </div>
    </form>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>