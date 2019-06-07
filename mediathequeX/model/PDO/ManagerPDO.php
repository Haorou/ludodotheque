<?php // Julien
class ManagerPDO
{
    function dbConnect()
    {
        $db = null;
        // typeSQL : hote de la base de donn�es (ici local) ; nom base de donn�es ; 
        // type charset ; nom utilisateur ; mot de passe
        try 
        {
            //$db = new PDO("mysql:host=localhost;port=3306;dbname=promo19_marcantoine;charset=utf8","promo19","user@sio19"); //connexion a la BD sio56@.org
            $db = new PDO("mysql:host=localhost;port=3306;dbname=mediatheque;charset=utf8","root",""); // connexion localhost
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On �met une alerte � chaque fois qu'une requ�te a �chou�.
        } 
        catch (PDOException $e) 
        {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
        return $db;
    }
}