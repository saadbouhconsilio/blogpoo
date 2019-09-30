<?php

require_once('DatabaseManager.php');

class CommentManager
{
    function getComments($postId)
    {
        $databasemanager = new DatabaseManager();
        $pdo = $databasemanager->dbConnect();
        $requete  = $pdo->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin\') AS date_commentaire_fr FROM commentaires WHERE id_public = ?  ORDER BY date_commentaire DESC');
        $requete ->execute(array($postId));

        return $requete;
    }


    function postComment($postId, $author, $comment)
    {
        $databasemanager = new DatabaseManager();
        $pdo = $databasemanager->dbConnect();
        $comments = $pdo->prepare('INSERT INTO commentaires(id_public,auteur, commentaire, date_commentaire) VALUES (?,?,?,NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
   
}
