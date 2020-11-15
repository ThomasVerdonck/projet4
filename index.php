<?php
session_start();
require_once('controleur/front_controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listLastPosts') {
        listLastPosts();
    }
    elseif ($_GET['action'] == 'JeanForteroche') {
        require('vue/a_propos.php');
    }    
    elseif ($_GET['action'] == 'listAllPosts') {    	
        listAllPosts();
    }    
    elseif ($_GET['action'] == 'showPost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = intval($_GET['id']);
            post($id);
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'connection') {
          require('vue/connection.php');      
    }
    elseif ($_GET['action'] == 'connect') {        
        connectAdmin($_POST['pseudo'], $_POST['password']);        
    }
    elseif ($_GET['action'] == 'dashboard') {
        if(isset($_SESSION['pseudo'])){
            require('vue/dashboard.php');
        }
        else{
            echo "Vous n'avez pas le droit d'accéder à cette page.";
        }
    }
    elseif ($_GET['action'] == 'disconnect') {
        disconnect();
    }
    elseif ($_GET['action'] == 'listAllPostsAdmin') {
        if(isset($_SESSION['pseudo'])){
            allPostsAdmin();
        }
        else{
            echo "Vous n'avez pas le droit d'accéder à cette page.";
        }
    }
    elseif ($_GET['action'] == 'create_post') {
        if(isset($_SESSION['pseudo'])){
            require('vue/create_post.php');
        }
        else{
            echo "Vous n'avez pas le droit d'accéder à cette page.";
        }    
    }
    elseif ($_GET['action'] == 'addChap') {
        if(isset($_SESSION['pseudo'])){       
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                addChap($_POST['title'], $_POST['content']);
            }
            else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else{
            echo "Vous n'avez pas le droit d'accéder à cette page.";
        }
    }
    elseif ($_GET['action'] == 'suppChap') {
        if(isset($_SESSION['pseudo'])){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                suppChap($id);
            }
            else{
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
        else{
            echo "Vous n'avez pas le droit d'accéder à cette page.";
        }
    }
    elseif ($_GET['action'] === 'modifChap') {
        if(isset($_SESSION['pseudo'])){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                modifChap($id);
            }
            else{
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
        else{
            echo "Vous n'avez pas le droit d'accéder à cette page.";
        }
    }
    elseif ($_GET['action'] === 'updateChap') {
        if(isset($_SESSION['pseudo'])){
            $id = $_POST['id'];
            updateChap($id);
        }
        else{
            echo "Vous n'avez pas le droit d'accéder à cette page.";
        }
    }
    // signaler un commentaire
    elseif ($_GET['action'] === 'getReportedComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = $_GET['id'];
            reportedComment($id);
        }
        else{
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    //Gérer les commentaires signalés
    elseif ($_GET['action'] === 'manageComments') {
        if(isset($_SESSION['pseudo'])){
            allReportedComments();
        }
        else{
            echo "Vous n'avez pas le droit d'accéder à cette page.";
        }
    }

    elseif ($_GET['action'] === 'suppCom') {
        if(isset($_SESSION['pseudo'])){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                suppCom($id);
            }
            else{
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
        else{
            echo "Vous n'avez pas le droit d'accéder à cette page.";
        }
    }
    elseif ($_GET['action'] === 'letCom') {
        if(isset($_SESSION['pseudo'])){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                letCom($id);
            }
            else{
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
        else{
            echo "Vous n'avez pas le droit d'accéder à cette page.";
        }
    }
}

else {
    listLastPosts();
}