<?php
require_once("model/PDO/ManagerPDO.php");

class JeuManager extends ManagerPDO
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
    
    public function createJeu(Article $jeu)
    {
        $addArticle = $this->_db->prepare("INSERT INTO article(id_fiche_article, date_ajout, prix_achat)
                                        VALUES(:id_fiche_article, :date_ajout, :prix_achat)");
        $addArticle->execute(array(
            "id_fiche_article" => $jeu->fiche_article()->id(),
            "date_ajout" => $jeu->date_ajout(),
            "prix_achat" => $jeu->prix_achat()
        ));
        
        $jeu->hydrate(['id' => $this->_db->lastInsertId()]);
        
        
    }
    
    public function updateJeu(Jeu $jeu)
    {
        $updateArticle = $this->_db->prepare("UPDATE article
                                                 SET id_fiche_article = :id_fiche_article,
                                                 date_ajout = :date_ajout,
                                                 prix_achat = :prix_achat
                                                 WHERE id = :id)");
        
        $updateArticle->execute(array(
            "id_fiche_article" => $jeu->fiche_article()->id(),
            "date_ajout" => $jeu->date_ajout(),
            "prix_achat" => $jeu->prix_achat(),
            "id" => $jeu->id()
        ));
        
        foreach($jeu->alertes() as $alerte)
        {
            $updateAlerteJeu = $this->_db->prepare("UPDATE alerte
                                                    SET couleur = :couleur,
                                                    element_jeu = :element_jeu,
                                                    probleme = :probleme,
                                                    quantite = :quantite,
                                                    commentaire = :commentaire,
                                                    WHERE id = :id)");
            
            $updateAlerteJeu->execute(array(
                "couleur" => $alerte->couleur(),
                "element_jeu" => $alerte->element_jeu(),
                "probleme" => $alerte->probleme(),
                "quantite" => $alerte->quantite(),
                "commentaire" => $alerte->commentaire(),
                "id" => $alerte->id()
            ));
        }
        
        // emprunt
    }
    
    public function deleteJeu(Jeu $jeu) // A VOIR
    {
        $resultatsRequete = $this->_db->query('SELECT id_alerte FROM comp_alerte_jeu WHERE id_article = :id_article');
        $resultatsRequete->execute(array(
            "id_article" => $jeu->id()));
        
        $donneesIdAlerte = [];
        
        while($unResultat = $resultatsRequete->fetch())
        {
            $donneesIdAlerte[] = new AlerteJeu($unResultat);
        }
        
        $deleteCompAlerteJeu = $this->_db->prepare("DELETE FROM comp_alerte_jeu
                                        WHERE id_article = :id_article)");
        $deleteCompAlerteJeu->execute(array(
            "id_article" => $jeu->id()));
        
        $deleteEmprunt = $this->_db->prepare("DELETE FROM emprunt
                                        WHERE id_article = :id_article)");
        $deleteEmprunt->execute(array(
            "id_article" => $jeu->id()));
        
        $deleteAlerte = $this->_db->prepare("DELETE FROM alerte
                                        WHERE id_article = :id_article)");
        $deleteAlerte->execute(array(
            "id_article" => $jeu->id()));
        
        $deleteArticle = $this->_db->prepare("DELETE FROM article
                                        WHERE id = :id)");
        $deleteArticle->execute(array(
            "id" => $jeu->id()));
    }
    
    public function readJeu($info)
    {
        $ficheJeuManager = new FicheJeuManager();

        
        $resultJeu = $this->_db->query('SELECT * FROM article
                                INNER JOIN fiche_article ON fiche_article.id = article.id_fiche_article
                                INNER JOIN fiche_jeu ON fiche_jeu.id_fiche_article = fiche_article.id
                                WHERE article.id = '.$info);
        
        $donnees = $resultJeu->fetch(PDO::FETCH_ASSOC);

        $jeu = new Jeu($donnees);
        $ficheJeu = $ficheJeuManager->readFicheJeu($donnees["id_fiche_article"]);

        $jeu->setFiche_article($ficheJeu);
        
        return $jeu;
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