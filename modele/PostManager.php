<?php
require_once("Manager.php");
class PostManager extends Manager
{
    //Fonction qui renvoie la liste des 3 derniers articles:
    public function getLastPosts()
    {
        $bdd = $this->getBdd();
        $reponse = $bdd->query('SELECT id, titre, contenu, image, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM articles ORDER BY creation_date DESC LIMIT 0, 3');
        return $reponse;
    }

    public function getPost($postId)//récupère un post précis en fonction de son ID
    {
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('SELECT id, titre, contenu, image, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM articles WHERE id = ?');
        $reponse->execute(array($postId));
        $post = $reponse->fetch();
        return $post;
    }

    public function getAllPosts()
    {
        $bdd = $this->getBdd();
        $reponse = $bdd->query('SELECT id, titre, contenu, image, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM articles ORDER BY creation_date');
        return $reponse;
    }

    //  Récupération de l'utilisateur et de son pass haché
    public function recover($pseudo){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('SELECT pseudo, password FROM utilisateur WHERE pseudo = ?');
        $reponse->execute(array($pseudo));
        $resultat = $reponse->fetch();
        return $resultat;
    }
    //POUR CREER UN ARTICLE
    public function adminAddChap($title, $content, $fileName){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('INSERT INTO articles(titre, contenu, image, creation_date) 
        VALUES(?, ?, ?, NOW())');
        $addChap = $reponse->execute(array($title, $content, $fileName));
        return $addChap;
    }
    // SUPPRIMER UN ARTICLE
    public function adminSuppChap($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('DELETE FROM articles WHERE id = ?');
        $reponse->execute(array($id));
        $resultat = $reponse->fetch();
        return $resultat;
    }
    // MODIFIER UN CHAPITRE (2 fonctions car 2 boutons: un bouton 'Modifier' dans la page allPostsAdmin 
    // et un bouton 'Mettre à jour' dans page modify_post)
    public function modifAdminChap($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
        $modifChap = $reponse->execute(array($id));
        $result = $reponse->fetch();
        return $result;
    }

    public function updateAdminChapWithPic($id, $fileName){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('UPDATE articles SET titre = ?, contenu = ?, image = ? WHERE id = ?');
        $reponse->execute(array($_POST['title'], $_POST['content'], $fileName, $id));
        return $reponse;
    }

    public function updateAdminChap($id){
        $bdd = $this->getBdd();
        $reponse = $bdd->prepare('UPDATE articles SET titre = ?, contenu = ? WHERE id = ?');
        $reponse->execute(array($_POST['title'], $_POST['content'], $id));
        return $reponse;
    }
}