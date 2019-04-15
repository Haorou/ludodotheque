<?php
require_once("model/PDO/ManagerPDO.php");
    class PersonneManager extends ManagerPDO
    {
        private $_db;
        
        // DES QU'ON CREER VEUT ENREGISTRER UN ADHERENT, ON DOIT CREER LE MANAGER
        // $Manager = PersonneManager()
        // AVEC LE CONSTRUCTEUR ON SE CONNECT A LA DB
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
            $addPersonne = $this->_db->prepare("INSERT INTO personne(civilite, nom, prenom)
                                        VALUES(:civilite, :nom, :prenom)");
            $addPersonne->execute(array(
                "civilite" => $perso->civilite(),
                "nom" => $perso->nom(),
                "prenom" => $perso->prenom()
            ));

            $perso->hydrate(['id' => $this->_db->lastInsertId()]);
            
            $addAdresse = $this->_db->prepare("INSERT INTO adresse(numero, nom_voie, type_voie, complement, code_postal, VILLE)
                                        VALUES(:numero, :nom_voie, :type_voie, :complement, :code_postal, :ville)");
            
            $addAdresse->execute(array(
                "numero" => $perso->adresse()->numero(),
                "nom_voie" => $perso->adresse()->nom_voie(),
                "type_voie" => $perso->adresse()->type_voie(),
                "complement" => $perso->adresse()->complement(),
                "code_postal" => $perso->adresse()->code_postal(),
                "ville" => $perso->adresse()->ville(),
            ));
            
            $perso->adresse()->hydrate(['id' => $this->_db->lastInsertId()]);
            
            $addAdherent = $this->_db->prepare("INSERT INTO adherent(id_personne, id_adresse, commentaire)
                                        VALUES (:id_personne, :id_adresse, :commentaire)");

            $addAdherent->execute(array(
                "id_personne" => $perso->id(),
                "id_adresse" => $perso->adresse()->id(),
                "commentaire" => $perso->commentaire()
            ));
            
            $addDate = $this->_db->prepare("INSERT INTO adhesion(id_adherent, date_adhesion)
                                        VALUES (:id_adherent, :date_adhesion)");
            
            $addDate->execute(array(
                "id_adherent" => $perso->id(), 
                "date_adhesion" => $perso->first_date_adhesion()
            ));
            
            foreach($perso->ayant_droits() as $ayantdroit)
            {
                $this->createAyantDroit($ayantdroit, $perso);
            }
        }
        
        public function createAyantDroit(AyantDroit $perso, Adherent $referant)
        {
            $addPersonne = $this->_db->prepare("INSERT INTO personne(civilite, nom, prenom)
                                        VALUES(:civilite, :nom, :prenom)");
            $addPersonne->execute(array(
                "civilite" => $perso->civilite(),
                "nom" => $perso->nom(),
                "prenom" => $perso->prenom()
            ));
            
            $perso->hydrate(['id' => $this->_db->lastInsertId()]);
            
            $addAyantDroit = $this->_db->prepare("INSERT INTO ayantdroit(id_personne,id_adherent)
                                          VALUES(:id_ayantdroit, :id_adherent)");

            $addAyantDroit->execute(array(
                "id_ayantdroit" => $perso->id(),
                "id_adherent" => $referant->id()
            ));
        }
        
        public function addAdhesion(Adherent $perso)
        {
            $addAhession = $this->_db->prepare("INSERT INTO adhesion(id_adherent,date_adhesion)
                                          VALUES(:id_adherent, :date_adhesion)");
            
            $addAhession->execute(array(
                "id_adherent" => $perso->id(),
                "date_adhesion" => $perso->last_date_adhesion()
            ));
        }
        
        public function updateAdherent(Adherent $perso)
        {                        
            $updatePersonne = $this->_db->prepare("UPDATE personne
                                                 SET civilite = :civilite,
                                                 nom = :nom,
                                                 prenom = :prenom
                                                 WHERE id = :id");
            
            $updatePersonne->execute(array(
                "civilite" => $perso->civilite(),
                "nom" => $perso->nom(),
                "prenom" => $perso->prenom(),
                "id" => $perso->id()
            ));
            
            $updateAdresse = $this->_db->prepare("UPDATE adresse
                                               SET numero = :numero, nom_voie = :nom_voie, type_voie = :type_voie,
                                               complement = :complement, code_postal = :code_postal, ville = :ville
                                               WHERE id = :id");
            
            $updateAdresse->execute(array(
                "numero" => $perso->adresse()->numero(),
                "nom_voie" => $perso->adresse()->nom_voie(),
                "type_voie" => $perso->adresse()->type_voie(),
                "complement" => $perso->adresse()->complement(),
                "code_postal" => $perso->adresse()->code_postal(),
                "ville" => $perso->adresse()->ville(),
                "id" => $perso->adresse()->id()
            ));
            
            $updateAdherent = $this->_db->prepare("UPDATE adherent SET
                                                   commentaire = :commentaire,
                                                   id_adresse = :id_adresse
                                                   WHERE id_personne = :id_personne");
            
            $updateAdherent->execute(array(
                "commentaire" => $perso->commentaire(),
                "id_adresse" => $perso->adresse()->id(),
                "id_personne" => $perso->id()
            ));
            
            /*
            $addDate = $this->_db->prepare("INSERT INTO adhesion(id_adherent, date_adhesion)
                                        VALUES (:id_adherent, :date_adhesion)");
            
            $addDate->execute(array(
                "id_adherent" => $perso->id(),
                "date_adhesion" => $perso->first_date_adhesion()
            ));
            */
            
            foreach($perso->ayant_droits() as $ayantdroit)
            {
                $this->updateAyantDroit($ayantdroit);
            }
        }

        
        public function updateAyantDroit(AyantDroit $perso)
        {
            $updatePersonne = $this->_db->prepare("UPDATE personne
                                                 SET civilite = :civilite,
                                                 nom = :nom,
                                                 prenom = :prenom
                                                 WHERE id = :id");
            
            $updatePersonne->execute(array(
                "civilite" => $perso->civilite(),
                "nom" => $perso->nom(),
                "prenom" => $perso->prenom(),
                "id" => $perso->id()
                ));
        }
        
        public function deleteAdherent(Adherent $perso)
        {
            // ============== ICI ON SUPPRIME :   SES AYANTDROITS   ================================ //
            
            foreach($perso->ayant_droits() as $ayantdroit)
            {
                $deleteAyantdroit = $this->_db->prepare("DELETE FROM ayantdroit
                                        WHERE id_adherent = :id");
                $deleteAyantdroit->execute(array(
                    "id" => $perso->id()));
                
                $deletePersonne = $this->_db->prepare("DELETE FROM personne
                                        WHERE id = :id");
                
                $deletePersonne->execute(array(
                    "id" => $ayantdroit->id()));
            }
            
            // ============== ICI ON SUPPRIME :   SA DATE ADHESION   =========================== //
            
            $deleteAdhesion = $this->_db->prepare("DELETE FROM adhesion
                                        WHERE id_adherent = :id");
            $deleteAdhesion->execute(array(
                "id" => $perso->id()));
            
            
            // ============== ICI ON SUPPRIME :   SES EMPRUNTS   ================================ //
            
            $deleteEmprunt = $this->_db->prepare("DELETE FROM emprunt
                                        WHERE id_adherent = :id");
            
            $deleteEmprunt->execute(array(
                "id" => $perso->id()));
            
            // ============== ICI ON SUPPRIME :   ADHERENT   ================================ //
            
            $deleteAdherent = $this->_db->prepare("DELETE FROM adherent
                                        WHERE id_personne = :id");
            $deleteAdherent->execute(array(
                "id" => $perso->id()));
            
            // ============== ICI ON SUPPRIME :   SON ADRESSE   ================================ //
         
            $deleteAdresse = $this->_db->prepare("DELETE FROM adresse
                                        WHERE id = :id");
            $deleteAdresse->execute(array(
                "id" => $perso->adresse()->id()));
            
            // ============== ICI ON SUPPRIME :   LA PERSONNE   ================================ //
            
            
            $deletePersonne = $this->_db->prepare("DELETE FROM personne
                                        WHERE id = :id");
            
            $deletePersonne->execute(array(
                "id" => $perso->id()));
        }
        
        public function deleteAyantDroit(AyantDroit $perso)
        {
            $deleteAyantDroit = $this->_db->prepare("DELETE FROM ayantdroit
                                        WHERE id_personne = :id");
            $deleteAyantDroit->execute(array(
                "id" => $perso->id()));
            
            $deletePersonne = $this->_db->prepare("DELETE FROM personne
                                        WHERE id = :id");
            $deletePersonne->execute(array(
                "id" => $perso->id()));
        }
        
        public function readAdherent($info)
        {   
            // ============== ICI ON PEUPLE DE :      PERSONNE / ADHERENT   =========================== //
            
            $readAdherent = $this->_db->prepare('SELECT * FROM personne
                                    INNER JOIN adherent ON adherent.id_personne = personne.id 
                                    WHERE personne.id = :id');
            
            $readAdherent->execute(array(
                "id" => $info));
            
            $donneesAdherent = $readAdherent->fetch(PDO::FETCH_ASSOC);

            $adherent = new Adherent($donneesAdherent);

            // ============== ICI ON PEUPLE DE :      ADRESSE   =========================== //
            
            $readAdresse = $this->_db->prepare('SELECT * FROM adherent 
                                    INNER JOIN adresse ON adherent.id_adresse = adresse.id
                                    WHERE adherent.id_personne = :id');
            
            $readAdresse->execute(array(
                "id" => $info));
            
            $donneesAdresse = $readAdresse->fetch(PDO::FETCH_ASSOC);
            
            $adresse = new Adresse($donneesAdresse);
            
            $adherent->setAdresse($adresse);
            
            // ============== ICI ON PEUPLE DE :      DATE ADHESIONS  =========================== //
            
            $readAdhesion = $this->_db->prepare('SELECT * FROM adherent
                                    INNER JOIN adhesion ON adhesion.id_adherent = adherent.id_personne
                                    WHERE adherent.id_personne = :id');
            
            $readAdhesion->execute(array(
                "id" => $info));
            
            while($dateAdhesion = $readAdhesion->fetch())
            {
                $adherent->setDate_adhesions($dateAdhesion["date_adhesion"]);
            }
            
            // ============== ICI ON PEUPLE DE :      AYANT DROITS   =========================== //
            
            $readAyantdroit = $this->_db->prepare('SELECT * FROM ayantdroit 
                                          INNER JOIN adherent ON adherent.id_personne = ayantdroit.id_adherent
                                          INNER JOIN personne ON ayantdroit.id_personne = personne.id WHERE adherent.id_personne = :id');
            
            $readAyantdroit->execute(array(
                "id" => $info));
            
            while($ayantdroit = $readAyantdroit->fetch())
            {
                $adherent->setAyant_droits(new AyantDroit($ayantdroit));
            }
            
            return $adherent;
        }
        
        public function readAyantDroitById($id)
        {
            $q = $this->_db->prepare('SELECT * FROM ayantdroit
                                      INNER JOIN adherent ON adherent.id_personne = ayantdroit.id_adherent
                                      INNER JOIN personne ON ayantdroit.id_personne = personne.id WHERE personne.id = :id');
            $q->execute([':id' => $id]);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            
            return new AyantDroit($donnees);
        }
        
        public function adherentExists($info)
        {
            if (is_int($info)) // On veut voir si tel ayantdroit existe ayant pour id $info existe.
            {
                return (bool) $this->_db->query('SELECT COUNT(*) FROM adherent WHERE id_personne = '.$info)->fetchColumn();
            }
            // Sinon, c'est qu'on veut vérifier que le nom existe ou pas.
            $q = $this->_db->prepare('SELECT COUNT(*) FROM personne INNER JOIN adherent ON adherent.id_personne = personne.id WHERE nom = :nom');
            $q->execute([':nom' => $info]);
            
            return (bool) $q->fetchColumn();
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
        
        public function readAllAdherent()
        {
            $selectPerso = $this->_db->query("SELECT * FROM personne
                                        INNER JOIN adherent ON adherent.id_personne = personne.id");
            $listeDePersonnages = [];
            
            while($perso = $selectPerso->fetch())
            {
                $listeDePersonnages[] = new Adherent($perso);
            }
            return $listeDePersonnages;
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
        
        public function readRegion($code_postal)
        {
            $selectPerso = $this->_db->prepare("SELECT region FROM region_code_postal_ville
                                              WHERE code_postal = :code_postal");
            $selectPerso->execute(array(
               "code_postal" => $code_postal
            ));
            
            $region = $selectPerso->fetch();
            
            return $region["region"];
        }
        
        public function countAdherent()
        {
            return $this->_db->query("SELECT COUNT(*) FROM adherent")->fetchColumn();
        }
        
        public function countAyantDroit()
        {
            return $this->_db->query("SELECT COUNT(*) FROM ayantdroit")->fetchColumn();
        }
        
        public function closeConnexion()
        {
            $this->_db = null;
        }
    }