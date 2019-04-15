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
            "titre" => $ficheJeu->titre(),
            "auteur" => $ficheJeu->auteur(),
            "editeur" => $ficheJeu->editeur(),
            "age_min" => $ficheJeu->age_min(),
            "age_max" => $ficheJeu->age_max(),
            "date_de_publication" => $ficheJeu->date_de_publication()
        ));
        
        $ficheJeu->hydrate(['id' => $this->_db->lastInsertId()]);
        
        $addFicheJeu = $this->_db->prepare("INSERT INTO fiche_jeu(id_fiche_article, nombre_de_joueurs_min, nombre_de_joueurs_max, duree_min_de_jeu, duree_max_de_jeu, descriptif)
                                        VALUES(:id_fiche_article, :nombre_de_joueurs_min, :nombre_de_joueurs_max, :duree_min_de_jeu, :duree_max_de_jeu, :descriptif)");
        
        $addFicheJeu->execute(array(
            "id_fiche_article" => $ficheJeu->id(),
            "nombre_de_joueurs_min" => $ficheJeu->nombre_de_joueurs_min(),
            "nombre_de_joueurs_max" => $ficheJeu->nombre_de_joueurs_max(),
            "duree_min_de_jeu" => $ficheJeu->duree_min_de_jeu(),
            "duree_max_de_jeu" => $ficheJeu->duree_max_de_jeu(),
            "descriptif" => $ficheJeu->descriptif()
        ));
        
        foreach($ficheJeu->types_de_jeu() as $typeJeu)
        {
            $addFicheJeuTypeJeu = $this->_db->prepare("INSERT INTO comp_fiche_jeu_type_jeu(id_fiche_jeu, type_jeu)
                                                       VALUES(:id_fiche_jeu, :type_jeu)");
                $addFicheJeuTypeJeu->execute(array(
                    "id_fiche_jeu" => $ficheJeu->id(),
                    "type_jeu" => $typeJeu
                ));
         }
            
        foreach($ficheJeu->elements_du_jeu() as $elementDuJeu)
        {
            $addComptElementJeuFicheJeu = $this->_db->prepare("INSERT INTO comp_element_jeu_fiche_jeu(id_fiche_jeu, element_jeu, couleur, quantite)
                                                           VALUES(:id_fiche_jeu, :element_jeu, :couleur, :quantite)");
            
            $addComptElementJeuFicheJeu->execute(array(
                "id_fiche_jeu" => $ficheJeu->id(),
                "element_jeu" => $elementDuJeu->element_jeu(),
                "couleur" => $elementDuJeu->couleur(),
                "quantite" => $elementDuJeu->quantite()
            ));
        }
    }
        
    public function updateFicheJeu(FicheJeu $ficheJeu)
    {
        $updateFicheArticle = $this->_db->prepare("UPDATE fiche_article
                                                   SET titre = :titre,
                                                   auteur = :auteur,
                                                   editeur = :editeur,
                                                    age_min = :age_min,
                                                    age_max = :age_max,
                                                    date_de_publication = :date_de_publication
                                                    WHERE id = :id");
        $updateFicheArticle->execute(array(
            "titre" => $ficheJeu->titre(),
            "auteur" => $ficheJeu->auteur(),
            "editeur" => $ficheJeu->editeur(),
            "age_min" => $ficheJeu->age_min(),
            "age_max" => $ficheJeu->age_max(),
            "date_de_publication" => $ficheJeu->date_de_publication(),
            "id" => $ficheJeu->id()
        ));
        
        $updateFicheJeu = $this->_db->prepare("UPDATE fiche_jeu
                                              SET nombre_de_joueurs_min = :nombre_de_joueurs_min,
                                              nombre_de_joueurs_max = :nombre_de_joueurs_max,
                                              duree_min_de_jeu = :duree_min_de_jeu,
                                              duree_max_de_jeu = :duree_max_de_jeu,
                                              descriptif = :descriptif
                                              WHERE id_fiche_article = :id ");
        $updateFicheJeu->execute(array(
            "nombre_de_joueurs_min" => $ficheJeu->nombre_de_joueurs_min(),
            "nombre_de_joueurs_max" => $ficheJeu->nombre_de_joueurs_max(),
            "duree_min_de_jeu" => $ficheJeu->duree_min_de_jeu(),
            "duree_max_de_jeu" => $ficheJeu->duree_max_de_jeu(),
            "descriptif" => $ficheJeu->descriptif(),
            "id" => $ficheJeu->id()
        ));
        
        $deleteTypesJeu = $this->_db->prepare("DELETE FROM comp_fiche_jeu_type_jeu
                                               WHERE id_fiche_jeu = :id_fiche_jeu");
        
        $deleteTypesJeu->execute(array("id_fiche_jeu" => $ficheJeu->id()));
        
        foreach($ficheJeu->types_de_jeu() as $typeJeu)
        {
            $addFicheJeuTypeJeu = $this->_db->prepare("INSERT INTO comp_fiche_jeu_type_jeu(id_fiche_jeu, type_jeu)
                                                       VALUES(:id_fiche_jeu, :type_jeu)");
            $addFicheJeuTypeJeu->execute(array(
                "id_fiche_jeu" => $ficheJeu->id(),
                "type_jeu" => $typeJeu
            ));
        }
        
        foreach($ficheJeu->elements_du_jeu() as $elementDuJeu)
        {
            $addComptElementJeuFicheJeu = $this->_db->prepare("INSERT INTO comp_element_jeu_fiche_jeu(id_fiche_jeu, element_jeu, couleur, quantite)
                                                           VALUES(:id_fiche_jeu, :element_jeu, :couleur, :quantite)");
            
            $addComptElementJeuFicheJeu->execute(array(
                "id_fiche_jeu" => $ficheJeu->id(),
                "element_jeu" => $elementDuJeu->element_jeu(),
                "couleur" => $elementDuJeu->couleur(),
                "quantite" => $elementDuJeu->quantite()
            ));
        }
    }
    
    public function deleteFicheJeu(FicheJeu $ficheJeu) // A VOIR
    {        
        $resultatRequeteJeu = $this->_db->prepare('SELECT article.id FROM article
                                        WHERE id_fiche_article = :id');
        $resultatRequeteJeu->execute(array(
            "id" => $ficheJeu->id()
        ));
        
        $resultatRequeteAlerteJeu = $this->_db->prepare("SELECT alerte.id FROM alerte
                                                 INNER JOIN comp_alerte_jeu ON alerte.id = comp_alerte_jeu.id_alerte
                                                 INNER JOIN article ON article.id = comp_alerte_jeu.id_article
                                                 WHERE article.id_fiche_article = :id");
        
        $resultatRequeteAlerteJeu->execute(array(
            "id" => $ficheJeu->id()
        ));

        while($idArticle = $resultatRequeteJeu->fetch())
        {   
            $deleteCompAlerteJeu = $this->_db->prepare("DELETE FROM comp_alerte_jeu
                                                     WHERE id_article = :id");

            $deleteCompAlerteJeu->execute(array(
                "id" => $idArticle["id"]
            ));
            
            $deleteEmprunt = $this->_db->prepare("DELETE FROM emprunt
                                                 WHERE id_article = :id");
            
            $deleteEmprunt->execute(array(
                "id" => $idArticle["id"]
            ));
        }
        
        while($idAlerte = $resultatRequeteAlerteJeu->fetch())
        {
            $deleteAlerte = $this->_db->prepare("DELETE FROM alerte
                                                     WHERE id = :id");
            
            $deleteAlerte->execute(array(
                "id" => $idAlerte["id"]
            ));
        }
       
        $deleteArticles = $this->_db->prepare("DELETE FROM article
                                        WHERE id_fiche_article = :id");
        $deleteArticles->execute(array(
            "id" => $ficheJeu->id()));
        
        $deleteComptElementJeuFicheJeu = $this->_db->prepare("DELETE FROM comp_element_jeu_fiche_jeu
                                                                 WHERE id_fiche_jeu = :id");
        $deleteComptElementJeuFicheJeu->execute(array(
            "id" => $ficheJeu->id()));
        
        $deleteComptFicheJeuTypeJeu = $this->_db->prepare("DELETE FROM comp_fiche_jeu_type_jeu
                                                                 WHERE id_fiche_jeu = :id");
        $deleteComptFicheJeuTypeJeu->execute(array(
            "id" => $ficheJeu->id()));
        
        
        $deleteFicheJeu = $this->_db->prepare("DELETE FROM fiche_jeu
                                        WHERE id_fiche_article = :id_article");
        $deleteFicheJeu->execute(array(
            "id_article" => $ficheJeu->id()));
        
        $deleteFicheArticle = $this->_db->prepare("DELETE FROM fiche_article
                                        WHERE id = :id_article");
        $deleteFicheArticle->execute(array(
            "id_article" => $ficheJeu->id()));
    }
    
    public function readFicheJeu($info)
    {
        $readJeu = $this->_db->prepare("SELECT * FROM fiche_jeu
                                        INNER JOIN fiche_article ON fiche_article.id = fiche_jeu.id_fiche_article
                                        WHERE fiche_jeu.id_fiche_article = :id");
        $readJeu->execute(array(
            "id" => $info));
        
        $donnees = $readJeu->fetch(PDO::FETCH_ASSOC);

        $ficheJeu = new FicheJeu($donnees);
        
        $readTypeJeu = $this->_db->prepare("SELECT type_jeu FROM comp_fiche_jeu_type_jeu
                                        WHERE id_fiche_jeu = :id");
        $readTypeJeu->execute(array(
            "id" => $ficheJeu->id()));
        
        while($typeJeu = $readTypeJeu->fetch())
        {
            $ficheJeu->setTypes_de_jeu($typeJeu[0]);
        }

        $readElements = $this->_db->prepare("SELECT * FROM comp_element_jeu_fiche_jeu
                                        WHERE id_fiche_jeu = :id");
        $readElements->execute(array(
            "id" => $ficheJeu->id()));
        
        while($element = $readElements->fetch())
        {
            $ficheJeu->setElements_du_jeu(new ElementsDuJeu($element));
        }
        
        return $ficheJeu;
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
    
    public function readAllFicheJeux()
    {
        $resultatRequeteFicheJeu = $this->_db->query('SELECT fiche_article.titre, fiche_article.id FROM fiche_jeu
                                    INNER JOIN fiche_article ON fiche_article.id = fiche_jeu.id_fiche_article');
        
        $listeDeFicheJeux = [];
        
        while($uneFicheJeu = $resultatRequeteFicheJeu->fetch())
        {
            $listeDeFicheJeux[] = new FicheJeu($uneFicheJeu);
        }
        return $listeDeFicheJeux;
    }
    
    public function readTypesJeux()
    {
        $resultatRequeteTypeJeu = $this->_db->query('SELECT * FROM type_jeu');
        
        $listeDeTypesJeu = [];
        
        while($unTypeJeu = $resultatRequeteTypeJeu->fetch())
        {
            $listeDeTypesJeu[] = $unTypeJeu["type_jeu"];
        }
        
        return $listeDeTypesJeu;
    }
    
    public function countJeux()
    {
        return $this->_db->query("SELECT COUNT(*) FROM adherent")->fetchColumn();
    }

    public function closeConnexion()
    {
        $this->_db = null;
    }
    
}
