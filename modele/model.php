<?php
function getBdd(){
	try
	{
	    $bdd = new PDO('mysql:host=localhost:3308;dbname=projet4;charset=utf8', 'root', 'root');
	    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
	return $bdd;
}
//Fonction qui renvoie la liste des 3 derniers articles:
function getLastPosts()
{
	$bdd = getBdd();
	$reponse = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM articles ORDER BY creation_date DESC LIMIT 0, 3');
	return $reponse;
}

function getPost($postId)//récupère un post précis en fonction de son ID
{
    $bdd = getBdd();
    $reponse = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM articles WHERE id = ?');
    $reponse->execute(array($postId));
    $post = $reponse->fetch(); //POURQUOI L28 ET 29???
    return $post;
}

function getComments($postId)//récupère les commentaires associés à un ID de post
{
    $bdd = getBdd();
    $comments = $bdd->prepare('SELECT id, id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr, signalements FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
    $comments->execute(array($postId));
    return $comments;
}

function getAllPosts()
{
	$bdd = getBdd();
	$reponse = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM articles ORDER BY creation_date');
	return $reponse;
}

// Insertion d'une entrée dans la bdd
// Insertion des variables à l'aide d'une requête préparée
// On récupère les variables à partir de $_GET['id'] $_POST['author'] et $_POST['comment']
function postComment($postId, $author, $comment){
    $bdd = getBdd();
    $comments = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire, signalements) VALUES(?, ?, ?, NOW(), 0)');
    $affectedLines = $comments->execute(array($postId, $author, $comment));
    return $affectedLines;
}

//  Récupération de l'utilisateur et de son pass haché
function recover($pseudo){
	$bdd = getBdd();
	$reponse = $bdd->prepare('SELECT pseudo, password FROM connection WHERE pseudo = ?');
	$reponse->execute(array($pseudo));
	$resultat = $reponse->fetch();
	return $resultat;
}
//POUR CREER UN ARTICLE
function adminAddChap($title, $content){
	$bdd = getBdd();
    $reponse = $bdd->prepare('INSERT INTO articles(titre, contenu, creation_date) VALUES(?, ?, NOW())');
    $addChap = $reponse->execute(array($title, $content));
    return $addChap;
}
// SUPPRIMER UN ARTICLE
function adminSuppChap($id){
	$bdd = getBdd();
    $reponse = $bdd->prepare('DELETE FROM articles WHERE id = ?');
    $reponse->execute(array($id));
    $resultat = $reponse->fetch();
	return $resultat;
}
// MODIFIER UN CHAPITRE (2 fonctions car 2 boutons: un bouton 'Modifier' dans la page allPostsAdmin 
// et un bouton 'Mettre à jour' dans page modify_post)
function modifAdminChap($id){
	$bdd = getBdd();
   	$reponse = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
   	$modifChap = $reponse->execute(array($id));
   	$result = $reponse->fetch();
   	return $result;
}

function updateAdminChap($id){
	$bdd = getBdd();
	$reponse = $bdd->prepare('UPDATE articles SET titre = ?, contenu = ? WHERE id = ?');
	$reponse->execute(array($_POST['title'], $_POST['content'], $id));
	return $reponse;
}

// QUAND LE VISITEUR SIGNALE UN COMMENTAIRE (2 fonctions)
function reportedCom($id){
	$bdd = getBdd();
	$reponse = $bdd->prepare('UPDATE commentaires SET signalements = 1 WHERE id = ?');
	$reponse->execute(array($id));
	return $reponse;
}

function getReportedCom($id) {
	$bdd = getBdd();
	$reponse = $bdd->prepare('SELECT * FROM commentaires WHERE id = ? AND signalements > 0');
	$adminAddComment = $reponse->execute(array($id));
	return $reponse;
}

function getAllReportedComments(){
	$bdd = getBdd();
	$reponse = $bdd->prepare('SELECT * FROM commentaires WHERE signalements > 0');
	$reportedComments = $reponse->execute();
	return $reponse;
}

// SUPPRIMER UN COMMENTAIRE SIGNALE
function adminSuppCom($id){
	$bdd = getBdd();
    $reponse = $bdd->prepare('DELETE FROM commentaires WHERE id = ?');
    $reponse->execute(array($id));
    $resultat = $reponse->fetch();
	return $resultat;
}
// REMETTRE LE COMMENTAIRE SIGNALE
function adminLetCom($id){
	$bdd = getBdd();
	$reponse = $bdd->prepare('UPDATE commentaires SET signalements = 0 WHERE id = ?');
	$reponse->execute(array($id));
	return $reponse;
}
