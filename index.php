<?php
require('controller/controller.php');

if (isset($_GET['action'])) 
{   
    /**
     * Liste des publications
     */
    if ($_GET['action'] == 'listposts') {
        listPosts();
    }
    /**
     * Publication et ces commentaires
     */
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['publication']) && $_GET['publication'] > 0)
        {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de post envoyé';
        }
    }
    /**
     * Ajout de commentairre
     */
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['publication']) && $_GET['publication'] > 0) {

            addComment($_GET['publication'], $_POST['auteur'], $_POST['commentaire']);
        }
        else {
            echo 'Erreur : aucun identifiant de post envoyé';
        }
    }


}
else {
    listPosts();
}