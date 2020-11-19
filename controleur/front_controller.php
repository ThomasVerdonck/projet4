<?php
require('modele/PostManager.php');
require('modele/CommentManager.php');

function listLastPosts(){
    $postManager = new PostManager();
    $lastPosts = $postManager->getLastPosts();/*On appelle la fonction getLastPosts qui se trouve dans 
    le modèle, et on récupère la liste des articles dans la variable $lastPosts.*/
    require('vue/accueil.php');
}

function post($id){
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($id);
    $comments = $commentManager->getComments($id);
    require('vue/postView.php');
}

function listAllPosts(){
    $postManager = new PostManager();
    $allPosts = $postManager->getAllPosts();
    require('vue/Episodes.php');
}

/*Pour ajouter des commentaires, le contrôleur récupère les informations dont on a besoin (id du billet, 
auteur, commentaire) et les transmet au modèle.*/
function addComment($postId, $author, $comment){
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
/* Si tout va bien, il n'y a aucune page à afficher. Les données ont été insérées, on redirige donc le visiteur 
vers la page du billet pour qu'il puisse voir son commentaire qui vient d'être inséré.*/
        header('Location: index.php?action=showPost&id=' . $postId);
    }
}

// Connexion
function connectAdmin($pseudo, $pass){
    $postManager = new PostManager();
    $resultat = $postManager->recover($pseudo);
    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($pass, $resultat['password']);        
    if ($isPasswordCorrect === false) {
        echo htmlspecialchars('Mauvais identifiant ou mot de passe !');
    }
    else {// Création des variables de session pour y stocker le pseudo de l'admin 
        $_SESSION['pseudo'] = $pseudo;
        require('vue/dashboard.php');// on affiche la vue TdB avec require
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
    $postManager = new PostManager();
    $allPosts = $postManager->getAllPosts();
    require('vue/allPostsAdmin.php');
}

function addChap($title, $content){
    $allowed = array("image/jpeg", "image/jpg", "image/gif", "image/png");
    $fileName = $_FILES['file']['name'];    
    $fileType = $_FILES['file']['type'];
    $tmpName = $_FILES['file']['tmp_name'];                    
    // Vérifie la taille du fichier - 5Mo maximum:
    $maxSize = 5 * 1024 * 1024;
    $fileSize = $_FILES['file']['size'];
    if($fileSize > $maxSize){
        echo "Erreur: La taille du fichier est supérieure à la limite autorisée.";
        die();
    }
    // Vérifie l'extension du fichier:
    if(in_array($fileType, $allowed)){
        move_uploaded_file($tmpName, 'images/'.$fileName);
        $postManager = new PostManager();
        $addChap = $postManager->adminAddChap($title, $content, $fileName);
        if ($addChap === false) {
            die('Impossible d\'ajouter l\'article !');
        }
        else {
            header("Location: index.php?action=listAllPostsAdmin");
        }
    }
    else{
        echo "Erreur : Veuillez sélectionner un format de fichier valide.";
        die();
    }
    
}

function suppChap($id){
    $postManager = new PostManager();
    $suppChap = $postManager->adminSuppChap($id);
    allPostsAdmin();
}

function modifChap($id){
    $postManager = new PostManager();
    $modifChap = $postManager->modifAdminChap($id);
    require('vue/modify_post.php');
}

function updateChap($id){
    if (isset($_FILES) && $_FILES['file']['error'] === 0) {
        $allowed = array("image/jpeg", "image/jpg", "image/gif", "image/png");
        $fileName = $_FILES['file']['name'];    
        $fileType = $_FILES['file']['type'];
        $tmpName = $_FILES['file']['tmp_name'];
        // Vérifie la taille du fichier - 5Mo maximum:
        $maxSize = 5 * 1024 * 1024;
        $fileSize = $_FILES['file']['size'];
        if($fileSize > $maxSize){
            echo "Erreur: La taille du fichier est supérieure à la limite autorisée.";
            die();
        }
        if(in_array($fileType, $allowed)){
            move_uploaded_file($tmpName, 'images/'.$fileName);
            $postManager = new PostManager();
            $updateChapWithPic = $postManager->updateAdminChapWithPic($id, $fileName);
            if ($updateChapWithPic === false) {
                    die('Impossible de mettre à jour l\'article !');
                }
                else {
                    header('Location: index.php?action=listAllPostsAdmin');
                }
            }
        else{
            echo "Erreur : Veuillez sélectionner un format de fichier valide.";
            die();
        }
    }
    elseif (isset($_FILES) && $_FILES['file']['error'] === 4) {
        $postManager = new PostManager();
        $updateChap = $postManager->updateAdminChap($id);
        if ($updateChap === false) {
                die('Impossible de mettre à jour l\'article !');
        }
        else {
            header('Location: index.php?action=listAllPostsAdmin');
        }
    }    
}

function reportedComment($id){
    $commentManager = new CommentManager();
    $commentManager->reportedCom($id);
    header('Location: index.php?action=showPost&id=' . $_GET['postId']);    
}

function allReportedComments(){
    $commentManager = new CommentManager();
    $allReportedComments = $commentManager->getAllReportedComments();
    require('vue/reported_comments.php');
}

function suppCom($id){
    $commentManager = new CommentManager();
    $suppCom = $commentManager->adminSuppCom($id);
    header('Location: index.php?action=manageComments');
}

function letCom($id){
    $commentManager = new CommentManager();
    $letCom = $commentManager->adminLetCom($id);
    header('Location: index.php?action=manageComments');
}
