<?php // Julien
class ManagerPDO
{
    function dbConnect()
    {
        // typeSQL : hote de la base de donn�es (ici local) ; nom base de donn�es ; 
        // type charset ; nom utilisateur ; mot de passe
        $db = new PDO("mysql:host=localhost;dbname=mediatheque;charset=utf8","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On �met une alerte � chaque fois qu'une requ�te a �chou�.
        return $db;
    }
}