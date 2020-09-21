<?php
function getBdd(){
	try
	{
	    $bdd = new PDO('mysql:host=localhost:3307;dbname=projet4;charset=utf8', 'root', 'root');
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
    $post = $reponse->fetch(); //POURQUOI L30 ET 31???
    return $post;
}

function getComments($postId)//récupère les commentaires associés à un ID de post
{
    $bdd = getBdd();
    $comments = $bdd->prepare('SELECT id, id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
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
function postComment($postId, $author, $comment)
{
    $bdd = getBdd();
    $comments = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES(?, ?, ?, NOW())');
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



