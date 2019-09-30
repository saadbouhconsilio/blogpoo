<?php

class DatabaseManager 
{
    /*Connect to database with dbConnect() */
    function dbConnect()
    {
        $db_login = 'root';
        $db_password = 'root';
        try {
            $pdo = new PDO( 'mysql:host=localhost;dbname=test;charset=utf8',$db_login, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
        }
        catch(Exception $e)
        {
            die('Erreur :' .$e->get_message());
        }

        return $pdo;
    }
}