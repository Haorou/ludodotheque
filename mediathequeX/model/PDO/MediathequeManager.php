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
        
      return new Mediatheque($donnees);}
     
        
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
                "cout_adhesion" => $mediatheque->coutAdhesion(),
                "cout_caution" => $mediatheque->coutCaution(),
                "duree_adhesion" => $mediatheque->dureeAdhesion(),
                "nombre_emprunt_autorisee" => $mediatheque->nombreEmpruntAutorise(),
                "nombre_ayantdroit_autorisee" => $mediatheque->nombreAyantdroitAutorise(),
                "duree_emprunt" => $mediatheque->dureeEmprunt(),
                "duree_retard" => $mediatheque->dureeRetard(),
                
            ));
            // VOIR SI APPELLE AUTRE MANAGER
       }
        
        
       
    }