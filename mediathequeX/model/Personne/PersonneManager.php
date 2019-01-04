<?php
require_once("model/ManagerPDO.php");
    class PersonneManager extends ManagerPDO
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
        
        public function createAdherent(Adherent $perso)
        {
            $addPerso = $this->_db->prepare("INSERT INTO personnages(nom)
                                        VALUES(:nom)");
            $addPerso->execute(array(
                "nom" => $perso->nom()));
            
            $perso->hydrate(["id" => 8, "degats" => 0]);
            
            $perso->hydrate(['id' => $this->_db->lastInsertId(),
                'degats' => 0,]);
        }
        
        public function createAyantDroit(AyantDroit $perso)
        {
            $addPerso = $this->_db->prepare("INSERT INTO personnages(nom)
                                        VALUES(:nom)");
            $addPerso->execute(array(
                "nom" => $perso->nom()));
            
            $perso->hydrate(["id" => 8, "degats" => 0]);
            
            $perso->hydrate(['id' => $this->_db->lastInsertId(),
                'degats' => 0,]);
        }
        
        public function updateAdherent(Adherent $perso)
        {
            $updatePerso = $this->_db->prepare("UPDATE personnages
                                        SET nom = :nom, degats = :degats
                                        WHERE id = :id");
            $updatePerso->execute(array(
                "nom" => $perso->nom(),
                "degats" => $perso->degats(),
                "id" => $perso->id() ) );
        }
        
        public function updateAyantDroit(AyantDroit $perso)
        {
            $updatePerso = $this->_db->prepare("UPDATE personnages
                                        SET nom = :nom, degats = :degats
                                        WHERE id = :id");
            $updatePerso->execute(array(
                "nom" => $perso->nom(),
                "degats" => $perso->degats(),
                "id" => $perso->id() ) );
        }
        
        public function deleteAdherent(Adherent $perso)
        {
            $deletePerso = $this->_db->prepare("DELETE FROM personnages
                                        WHERE id = :id)");
            $deletePerso->execute(array(
                "id" => $perso->id()));
        }
        
        public function deleteAyantDroit(AyantDroit $perso)
        {
            $deletePerso = $this->_db->prepare("DELETE FROM personnages
                                        WHERE id = :id)");
            $deletePerso->execute(array(
                "id" => $perso->id()));
        }
        
        public function readAdherent($info)
        {            
            if (is_int($info))
            {
                $q = $this->_db->query('SELECT id, nom, degats FROM personnages WHERE id = '.$info);
                $donnees = $q->fetch(PDO::FETCH_ASSOC);
                
                return new Adherent($donnees);
            }
            else
            {
                $q = $this->_db->prepare('SELECT id, nom, degats FROM personnages WHERE nom = :nom');
                $q->execute([':nom' => $info]);
                
                return new Adherent($q->fetch(PDO::FETCH_ASSOC));
            }
        }
        
        public function readAAyantDroit($info)
        {    
            if (is_int($info))
            {
                $q = $this->_db->query('SELECT id, nom, degats FROM personnages WHERE id = '.$info);
                $donnees = $q->fetch(PDO::FETCH_ASSOC);
                
                return new AyantDroit($donnees);
            }
            else
            {
                $q = $this->_db->prepare('SELECT id, nom, degats FROM personnages WHERE nom = :nom');
                $q->execute([':nom' => $info]);
                
                return new AyantDroit($q->fetch(PDO::FETCH_ASSOC));
            }
        }
        
        public function adherentExists($info)
        {
            if (is_int($info)) // On veut voir si tel personnage ayant pour id $info existe.
            {
                return (bool) $this->_db->query('SELECT COUNT(*) FROM personnages WHERE id = '.$info)->fetchColumn();
            }
            // Sinon, c'est qu'on veut vérifier que le nom existe ou pas.
            $q = $this->_db->prepare('SELECT COUNT(*) FROM personnages WHERE nom = :nom');
            $q->execute([':nom' => $info]);
            
            return (bool) $q->fetchColumn();
        }
        
        public function ayantDroitExists($info)
        {
            if (is_int($info)) // On veut voir si tel personnage ayant pour id $info existe.
            {
                return (bool) $this->_db->query('SELECT COUNT(*) FROM personnages WHERE id = '.$info)->fetchColumn();
            }
            // Sinon, c'est qu'on veut vérifier que le nom existe ou pas.
            $q = $this->_db->prepare('SELECT COUNT(*) FROM personnages WHERE nom = :nom');
            $q->execute([':nom' => $info]);
            
            return (bool) $q->fetchColumn();
        }
        
        public function readAllAdherent()
        {
            $selectPerso = $this->_db->query("SELECT * FROM personnages");
            $listeDePersonnages = [];
            
            while($perso = $selectPerso->fetch())
            {
                $listeDePersonnages[] = new Adherent($perso);
            }
            return $listeDePersonnages;
        }
        
        public function readAllAyantDroit()
        {
            $selectPerso = $this->_db->query("SELECT * FROM personnages");
            $listeDePersonnages = [];
            
            while($perso = $selectPerso->fetch())
            {
                $listeDePersonnages[] = new AyantDroit($perso);
            }
            return $listeDePersonnages;
        }
        
        public function countAdherent()
        {
            return $this->_db->query("SELECT COUNT(*) FROM personnages")->fetchColumn();
        }
        
        public function countAyantDroit()
        {
            return $this->_db->query("SELECT COUNT(*) FROM personnages")->fetchColumn();
        }
        
        
    }