<?php
//On charge le fichier du modèle:
require('modele/model.php');

function listLastPosts()
{
    $lastPosts = getLastPosts();//On appelle la fonction getLastPosts qui se trouve dans model.php, et on récupère
    //la liste des articles dans la variable $lastPosts.

    require('vue/accueil.php');//On charge le fichier de la vue accueil.php
}

// Ne dois-je pas ajouter: if (isset($_GET['id']) && $_GET['id'] > 0)? --> Oui, cf routeur index.php
function post($id)
{
    $post = getPost($id);// ces 2 fonctions getPost et getComments se trouvent dans model.php
    $comments = getComments($id);
    require('vue/postView.php');//On charge le fichier de la vue postView.php qui affiche l'article et ses commentaires
}

function listAllPosts()
{
    $allPosts = getAllPosts();//On appelle la fonction getAllPosts qui se trouve dans model.php, et on récupère
    //la liste des articles dans la variable $allPosts.

    require('vue/Episodes.php');//On charge le fichier de la vue.
}

//Pour ajouter des commentaires, le contrôleur récupère les informations dont on a besoin (id du billet, auteur,
// commentaire) et les transmet au modèle.
function addComment($postId, $author, $comment)
{
    $affectedLines = postComment($postId, $author, $comment);
//On teste le retour de la requête. Normalement, celle-ci renvoie le nombre de lignes impactées par la requête ou
//"false" s'il y a eu une erreur. On teste donc s'il y a eu une erreur, et on arrête tout (avec un die) si jamais 
//il y a eu un souci.
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
// Si tout va bien, il n'y a aucune page à afficher. Les données ont été insérées, on redirige donc le visiteur 
// vers la page du billet pour qu'il puisse voir son beau commentaire qui vient d'être inséré
        header('Location: index.php?action=showPost&id=' . $postId);
    }
}

// Connexion
function addUser($pseudo, $pass){
    $resultat = recover($pseudo);
    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($pass, $resultat['password']);        
    if ($isPasswordCorrect === false) {
        echo htmlspecialchars('Mauvais identifiant ou mot de passe !');
    }
    else {// Création des variables de session pour y stocker le pseudo de l'admin 
        $_SESSION['pseudo'] = $pseudo;
        require('vue/dashboard.php');// on affiche la vue TdB avec require
        //echo 'Vous êtes connecté !';
    }
}
//DECONNEXION:
// Suppression des variables de session
function disconnect(){
    $_SESSION = array();
    session_destroy();
    header("Location: index.php?action=listLastPosts");
}

function allPostsAdmin(){
    $allPosts = getAllPosts();
    require('vue/allPostsAdmin.php');
}

function addChap($title, $content){
    $addChap = adminAddChap($title, $content);
    if ($addChap === false) {
        die('Impossible d\'ajouter l\'article !');
    }
    else {
        header("Location: index.php?action=listAllPostsAdmin");
    }
}

function suppChap($id){
    $suppChap = adminSuppChap($id);
    allPostsAdmin();
}

function modifChap($id){
    $modifChap = modifAdminChap($id);
    require('vue/modify_post.php');

}

function updateChap($id){
    $updateChap = updateAdminChap($id);
    header('Location: index.php?action=listAllPostsAdmin');
}

function reportedComment($id){
    reportedCom($id);
    header('Location: index.php?action=showPost&id=' . $_GET['postId']);    
}

function suppCom($id){
    $suppCom = adminSuppCom($id);
    header('Location: index.php?action=manageComments');
}

function letCom($id){
    $letCom = adminLetCom($id);
    header('Location: index.php?action=manageComments');

}

function allReportedComments(){
    $allReportedComments = getAllReportedComments();
    require('vue/reported_comments.php');
}