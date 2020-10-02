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
    elseif ($_GET['action'] == 'connection') {
          require('vue/connection.php');      
    }
    elseif ($_GET['action'] == 'connect') {
        addUser($_POST['pseudo'], $_POST['password']);
    }
    elseif ($_GET['action'] == 'dashboard') {
        require('vue/dashboard.php');
    }
    elseif ($_GET['action'] == 'disconnect') {
        disconnect();
    }
    elseif ($_GET['action'] == 'listAllPostsAdmin') {
        allPostsAdmin();
    }
    elseif ($_GET['action'] == 'suppChap') {
        $id = $_GET['id'];
        suppChap($id);
    }
    elseif ($_GET['action'] == 'create_post') {
        if (isset($_SESSION['pseudo'])) {
            require('vue/create_post.php');
        }        
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
    elseif ($_GET['action'] == 'listAllPosts') {    	
        listAllPosts();
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
}
else {
    listLastPosts();
}