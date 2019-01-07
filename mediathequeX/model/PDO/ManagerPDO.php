<?php // Julien
class ManagerPDO
{
    function dbConnect()
    {
        // typeSQL : hote de la base de données (ici local) ; nom base de données ; 
        // type charset ; nom utilisateur ; mot de passe
        $db = new PDO("mysql:host=localhost;dbname=mediatheque;charset=utf8","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
        return $db;
    }
}