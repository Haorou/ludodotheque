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
            "id_fiche_article" => $jeu->ficheArticle()->id(),
            "date_ajout" => $jeu->dateAjout(),
            "prix_achat" => $jeu->prixAchat()
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
            "id_fiche_article" => $jeu->ficheArticle()->id(),
            "date_ajout" => $jeu->dateAjout(),
            "prix_achat" => $jeu->prixAchat(),
            "id" => $jeu->id()
        ));
        // VOIR SI APPELLE AUTRE MANAGER
    }
    
    public function deleteJeu(Jeu $jeu) // A VOIR
    {
        $resultatsRequete = $this->_db->query('SELECT id_alerte FROM comp_alerte_jeu WHERE id_article = :id_article');
        $resultatsRequete->execute(array(
            "id_article" => $jeu->id()));
        
        $donneesIdAlerte = [];
        
        while($unResultat = $resultatsRequete->fetch())
        {
            $donneesIdAlerte[] = new AlerteJeu($perso);
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