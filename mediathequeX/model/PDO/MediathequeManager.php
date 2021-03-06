<?php
require_once ("model/PDO/ManagerPDO.php");

class MediathequeManager extends ManagerPDO
    {
        private $_db;
        
        public function __construct()
        {
            $db = $this->dbConnect();
            $this->setDb($db);
        }
        
        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    
    
        public function readParametre()
        {
            $q = $this->_db->query('SELECT * FROM parametres');
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            
            return new Mediatheque($donnees);
        }

        public function connexion(Utilisateur $utilisateur)
        {
            $q = $this->_db->prepare('SELECT * FROM utilisateur WHERE 
                                    pseudo = :pseudo AND 
                                    mot_de_passe = :mot_de_passe');
            
            $q->execute(array(
                "pseudo" => $utilisateur->pseudo(),
                "mot_de_passe" => $utilisateur->mot_de_passe()
            ));
            
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            
            $connexionIsReady = FALSE;
            
            if($donnees != NULL)
                $connexionIsReady = TRUE;
            
            return $connexionIsReady;
        }
        
       public function updateParametre(Mediatheque $mediatheque)
        {
            $updateArticle = $this->_db->prepare("UPDATE parametres
                                                 SET cout_adhesion = :cout_adhesion,
                                                 cout_caution = :cout_caution,
                                                 duree_adhesion = :duree_adhesion,
                                                 nombre_emprunt_autorisee = :nombre_emprunt_autorisee,
                                                 nombre_ayantdroit_autorisee = :nombre_ayantdroit_autorisee,
                                                 duree_emprunt = :duree_emprunt,
                                                 duree_retard = : duree_retard");
            
            $updateArticle->execute(array(
                "cout_adhesion" => $mediatheque->cout_adhesion(),
                "cout_caution" => $mediatheque->cout_caution(),
                "duree_adhesion" => $mediatheque->duree_adhesion(),
                "nombre_emprunt_autorisee" => $mediatheque->nombre_emprunt_autorisee(),
                "nombre_ayantdroit_autorisee" => $mediatheque->nombre_ayantdroit_autorisee(),
                "duree_emprunt" => $mediatheque->duree_emprunt(),
                "duree_retard" => $mediatheque->duree_retard()
                
            ));
       }
       
       public function closeConnexion()
       {
           $this->_db = null;
       }
    }