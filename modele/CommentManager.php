<?php
require_once("Manager.php");
class CommentManager extends Manager
{
    public function getComments($postId)//récupère les commentaires associés à un ID de post
    {
        $bdd = $this->getBdd();
        $comments = $bdd->prepare('SELECT id, id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr, signalements FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
        $comments->execute(array($postId));
        return $comments;
    }

    // Insertion des variables à l'aide d'une requête préparée
    // On récupère les variables à partir de $_GET['id'] $_POST['author'] et $_POST['comment']
    public function postComment($postId, $author, $comment){
        $bdd = $this->getBdd();
        $comments = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire, signalements) VALUES(?, ?, ?, NOW(), 0)');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }

    // QUAND LE VISITEUR SIGNALE UN COMMENTAIRE
    public function reportedCom($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('UPDATE commentaires SET signalements = 1 WHERE id = ?');
        $reponse->execute(array($id));
        return $reponse;
    }

    // AFFICHER LES COMMENTAIRES SIGNALES
    public function getAllReportedComments(){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('SELECT * FROM commentaires WHERE signalements > 0');
        $allReportedComments = $reponse->execute();
        return $reponse;
    }

    // SUPPRIMER UN COMMENTAIRE SIGNALE
    public function adminSuppCom($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('DELETE FROM commentaires WHERE id = ?');
        $reponse->execute(array($id));
        $resultat = $reponse->fetch();
        return $resultat;
    }
    
    // REMETTRE LE COMMENTAIRE SIGNALE
    public function adminLetCom($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('UPDATE commentaires SET signalements = 0 WHERE id = ?');
        $reponse->execute(array($id));
        return $reponse;
    }
}