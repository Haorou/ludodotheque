<?php
require_once("model/PDO/ManagerPDO.php");

    class EmpruntManager extends ManagerPDO
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
    
        public function createEmprunt(Emprunt $empruntArticle)
        {
            $addEmpruntArticle = $this->_db->prepare("INSERT INTO emprunt(id_article, id_adherent, date_emprunt, date_de_retour_effectif, commentaire)
                                            VALUES(:id_article, :id_adherent, :date_emprunt, :date_de_retour_effectif, :commentaire)");
            $addEmpruntArticle->execute(array(
                "id_article" => $empruntArticle->article()->id(),
                "id_adherent" => $empruntArticle->adherent()->id(),
                "date_emprunt" => $empruntArticle->date_emprunt(),
                "date_de_retour_effectif" => $empruntArticle->date_de_retour_effectif(),
                "commentaire" => $empruntArticle->commentaire()
            ));
        }
        
        public function deleteEmprunt(Emprunt $perso)
        {
            $deleteAyantDroit = $this->_db->prepare("DELETE FROM ayantdroit
                                        WHERE id = :id)");
            $deleteAyantDroit->execute(array(
                "id" => $perso->id()));
            
            $deletePersonne = $this->_db->prepare("DELETE FROM personne
                                        WHERE id = :id)");
            $deletePersonne->execute(array(
                "id" => $perso->id()));
        }

        
        public function readAyantDroit(Adherent $perso)
        {
            $q = $this->_db->prepare('SELECT * FROM ayantdroit
                                          INNER JOIN adherent ON adherent.id = ayantdroit.id_adherent
                                          INNER JOIN personne ON ayantdroit.id_personne = personne.id WHERE id = :id');
            $q->execute([':id' => $perso->id()]);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            
            return new AyantDroit($donnees);
        }
        
        
        public function ayantDroitExists($info)
        {
            if (is_int($info)) // On veut voir si tel ayantdroit existe ayant pour id $info existe.
            {
                return (bool) $this->_db->query('SELECT COUNT(*) FROM ayantdroit WHERE id_personne = '.$info)->fetchColumn();
            }
            // Sinon, c'est qu'on veut vérifier que le nom existe ou pas.
            $q = $this->_db->prepare('SELECT COUNT(*) FROM personne INNER JOIN ayantdroit ON ayantdroit.id_personne = personne.id WHERE nom = :nom');
            $q->execute([':nom' => $info]);
            
            return (bool) $q->fetchColumn();
        }

        
        public function readAllAyantDroit()
        {
            $selectPerso = $this->_db->query("SELECT * FROM ayantdroit
                                              INNER JOIN adherent ON adherent.id = ayantdroit.id_adherent
                                              INNER JOIN ayantdroit ON ayantdroit.id_personne = personne.id");
            $listeDePersonnages = [];
            
            while($perso = $selectPerso->fetch())
            {
                $listeDePersonnages[] = new AyantDroit($perso);
            }
            return $listeDePersonnages;
        }
        
        public function countAyantDroit()
        {
            return $this->_db->query("SELECT COUNT(*) FROM ayantdroit")->fetchColumn();
        }
        
    }