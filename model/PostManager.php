<?php

require_once('DatabaseManager.php');

class PostManager
{
    public function getPosts()
    {
        $databasemanager = new DatabaseManager();
        $pdo = $databasemanager->dbConnect();
        $requete = $pdo->query('SELECT id, titre, auteur, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin\') AS date_creation_fr FROM publications ORDER BY date_creation DESC LIMIT 0, 5' );

        return $requete;
    }


    public function getIdPosts()
    {
        $databasemanager = new DatabaseManager();
        $pdo = $databasemanager->dbConnect();
        $requete = $pdo->query('SELECT id FROM publications');
        $idposts = $requete->fetch();

        return $idposts;
    }


    public function getPost($postId)
    {
        $databasemanager = new DatabaseManager();
        $pdo = $databasemanager->dbConnect();
        $requete = $pdo->prepare('SELECT id, titre, auteur, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin\') AS date_creation_fr FROM publications WHERE id = ?');
        $requete ->execute(array($postId));
        $post = $requete->fetch();

        return $post;
    }

}