<?php
require_once("model/PDO/ManagerPDO.php");

    class FicheJeuManager extends ManagerPDO
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
        
        public function createFicheJeu(FicheJeu $ficheJeu)
        {
            $addFicheArticle = $this->_db->prepare("INSERT INTO fiche_article(titre, auteur, editeur, age_min, age_max, date_de_publication)
                                        VALUES(:titre, :auteur, :editeur, :age_min, :age_max, :date_de_publication)");
            $addFicheArticle->execute(array(
                "id" => $ficheJeu->id(),
                "titre" => $ficheJeu->titre(),
                "auteur" => $ficheJeu->auteur(),
                "editeur" => $ficheJeu->editeur(),
                "age_min" => $ficheJeu->ageMin(),
                "age_max" => $ficheJeu->ageMax(),
                "date_de_publication" => $ficheJeu->dateDePublication()
            ));
            
            $ficheJeu->hydrate(['id' => $this->_db->lastInsertId()]);
            
            $addFicheJeu = $this->_db->prepare("INSERT INTO fiche_jeu(nombre_de_joueurs_min, nombre_de_joueurs_max, duree_min_de_jeu, duree_max_de_jeu, descriptif)
                                        VALUES(:nombre_de_joueurs_min, :nombre_de_joueurs_max, :duree_min_de_jeu, :duree_max_de_jeu, :descriptif)");
        
            $addFicheJeu->execute(array(
                "nombre_de_joueurs_min" => $ficheJeu->nbreJoueurMin(),
                "nombre_de_joueurs_max" => $ficheJeu->nbreJoueurMax(),
                "duree_min_de_jeu" => $ficheJeu->dureeMinDeJeu(),
                "duree_max_de_jeu" => $ficheJeu->dureeMaxDeJeu(),
                "descriptif" => $ficheJeu->descriptif()
            ));
                        
            foreach($ficheJeu->typesDeJeu() as $typeJeu)
            {
                $addFicheJeuTypeJeu = $this->_db->prepare("INSERT INTO comp_fiche_jeu_type_jeu(id_fiche_jeu, type_jeu)
                                                       VALUES(:id_fiche_jeu, :type_jeu)");
                $addFicheJeuTypeJeu->execute(array(
                    "id_fiche_jeu" => $ficheJeu->id(),
                    "type_jeu" => $typeJeu
                ));
            }
            
            foreach($ficheJeu->elementsDuJeu() as $elementDuJeu)
            {
                $addComptElementJeuFicheJeu = $this->_db->prepare("INSERT INTO comp_element_jeu_fiche_jeu(id_fiche_jeu, element_jeu, couleur, quantite)
                                                               VALUES(:id_fiche_jeu, :element_jeu, :couleur, :quantite)");
                
                $addComptElementJeuFicheJeu->execute(array(
                    "id_fiche_jeu" => $ficheJeu->id(),
                    "element_jeu" => $elementDuJeu->element_du_jeu(),
                    "couleur" => $elementDuJeu->couleur(),
                    "quantite" => $elementDuJeu->quantite()
                ));
            }
        }
        
        public function updateJeu(Jeu $ficheJeu)
        {
            $updateFicheArticle = $this->_db->prepare("UPDATE fiche_article SET 
                                                   SET titre = :titre, 
                                                   auteur = :auteur, 
                                                   editeur = :editeur,
                                                    age_min = :age_min, 
                                                    age_max = :age_max,
                                                    date_de_publication = :date_de_publication
                                                    WHERE id = :id)");
            $updateFicheArticle->execute(array(
                "id" => $ficheJeu->id(),
                "titre" => $ficheJeu->titre(),
                "auteur" => $ficheJeu->auteur(),
                "editeur" => $ficheJeu->editeur(),
                "age_min" => $ficheJeu->ageMin(),
                "age_max" => $ficheJeu->ageMax(),
                "date_de_publication" => $ficheJeu->dateDePublication(),
                "id" => $ficheJeu->id()
            ));
            
            $updateFicheJeu = $this->_db->prepare("UPDATE fiche_jeu SET
                                                   SET nombre_de_joueurs_min = :nombre_de_joueurs_min,
                                                   nombre_de_joueurs_max = :nombre_de_joueurs_max,
                                                   duree_min_de_jeu = :duree_min_de_jeu,
                                                    duree_max_de_jeu = :duree_max_de_jeu,
                                                    descriptif = :descriptif,
                                                    WHERE id_fiche_article = :id)");
            $updateFicheJeu->execute(array(
                "nombre_de_joueurs_min" => $ficheJeu->nbreJoueurMin(),
                "nombre_de_joueurs_max" => $ficheJeu->nbreJoueurMax(),
                "duree_min_de_jeu" => $ficheJeu->dureeMinDeJeu(),
                "duree_max_de_jeu" => $ficheJeu->dureeMaxDeJeu(),
                "descriptif" => $ficheJeu->descriptif(),
                "id" => $ficheJeu->id()
            ));
        }
        
        public function deleteFicheJeu(FicheJeu $ficheJeu) // A VOIR
        {   
            $deleteArticles = $this->_db->prepare("DELETE FROM article
                                        WHERE id_fiche_article= :id)");
            $deleteArticles->execute(array(
                "id" => $ficheJeu->id()));
            
            $deleteFicheJeu = $this->_db->prepare("DELETE FROM fiche_jeu
                                        WHERE id_fiche_article = :id_article)");
            $deleteFicheJeu->execute(array(
                "id_article" => $ficheJeu->id()));
            
            $deleteFicheArticle = $this->_db->prepare("DELETE FROM fiche_article
                                        WHERE id = :id_article)");
            $deleteFicheArticle->execute(array(
                "id_article" => $ficheJeu->id()));
           
            $deleteComptElementJeuFicheJeu = $this->_db->prepare("DELETE FROM comp_element_jeu_fiche_jeu
                                                                 WHERE id_fiche_jeu = :id)");
            $deleteComptElementJeuFicheJeu->execute(array(
                "id_fiche_jeu" => $ficheJeu->id()));
            
            $listeDeJeux = [];
            $listeAlertes = [];
            
            $resultatRequetJeu = $this->_db->prepare('SELECT * FROM article
                                    WHERE fiche_article_id = :id');
            $resultatRequetJeu->execute(array(
                "id" => $ficheJeu->id()
            ));
            
            while($unJeu = $resultatRequetJeu->fetch())
            {
                $listeDeJeux[] = new Jeu($unJeu);
            }
            
            $resultatRequetAlerte = $this->_db->prepare('SELECT * FROM alerte 
                                                INNER JOIN comp_alerte_jeu ON comp_alerte_jeu.id_alerte = alerte.id
                                                WHERE comp_alerte_jeu.id_article = :id');
            
            $resultatRequetAlerte->execute(array(
                "id" => $ficheJeu->id()
            ));
            
            while($uneAlerte = $resultatRequetAlerte->fetch())
            {
                $listeAlertes[] = new AlerteJeu($uneAlerte);
            }
            
             
            foreach($listeDeJeux as $jeu)
            {
                $deleteCompAlerteJeu = $this->_db->prepare("DELETE FROM comp_alerte_jeu
                                                     WHERE id_article = :id)");
                
                $deleteEmprunt = $this->_db->prepare("DELETE FROM emprunt
                                                 WHERE id_article = :id)");
                
                $deleteCompAlerteJeu->execute(array(
                    "id" => $jeu->id()
                ));    
                $deleteEmprunt->execute(array(
                    "id" => $jeu->id()
                ));
            }
            
            foreach($listeAlertes as $alerte)
            {
                $deleteAlerteJeu = $this->_db->prepare("DELETE FROM alerte
                                                 WHERE id_article = :id)");
                
                $deleteAlerteJeu->execute(array(
                    "id" => $alerte->id()
                ));
            }
            
        }
        
        
        // OON EST ICICICICICICICICCICII
        
        public function readJeu($info)
        {
            $q = $this->_db->query('SELECT * FROM article
                                    INNER JOIN fiche_article ON fiche_article.id = article.id_fiche_article
                                    WHERE article.id = '.$info);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            
            $jeu = new Jeu($donnees);
            
        }
        
        public function jeuExists($info)
        {
            return (bool) $this->_db->query('SELECT COUNT(*) FROM article WHERE id = '.$info)->fetchColumn();
        }
        
        public function readAllJeux()
        {
            $resultatRequeteJeu = $this->_db->query('SELECT fiche_article.titre FROM article
                                    INNER JOIN fiche_article ON fiche_article.id = article.id_fiche_article');
            
            $listeDeJeux = [];
            
            while($unJeu = $resultatRequeteJeu->fetch())
            {
                $listeDeJeux[] = new Jeu($unJeu);
            }
            return $listeDeJeux;
        }
        
        public function countJeux()
        {
            return $this->_db->query("SELECT COUNT(*) FROM adherent")->fetchColumn();
        }
    }