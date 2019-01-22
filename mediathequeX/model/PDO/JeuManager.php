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
        $addArticle = $this->_db->prepare("INSERT INTO article(id_fiche_article, date_ajout, prix_achat, commentaire)
                                        VALUES(:id_fiche_article, :date_ajout, :prix_achat, :commentaire)");
        $addArticle->execute(array(
            "id_fiche_article" => $jeu->fiche_article()->id(),
            "date_ajout" => $jeu->date_ajout(),
            "prix_achat" => $jeu->prix_achat(),
            "commentaire" => $jeu->commentaire()
        ));
        
        $jeu->hydrate(['id' => $this->_db->lastInsertId()]);
        
        foreach($jeu->alertes() as $alerte)
        {
            $addAlerteJeu = $this->_db->prepare("INSERT INTO alerte(couleur,element_jeu,probleme,quantite,commentaire)
                                                    VALUES(:couleur,:element_jeu,:probleme,:quantite,:commentaire)");
            
            $addAlerteJeu->execute(array(
                "couleur" => $alerte->couleur(),
                "element_jeu" => $alerte->element_jeu(),
                "probleme" => $alerte->probleme(),
                "quantite" => $alerte->quantite(),
                "commentaire" => $alerte->commentaire(),
            ));
            
            $alerte->hydrate([ 'id' => $this->_db->lastInsertId() ]);
            $alerte->setDate($jeu->date_ajout());
            
            $addCompAlerteJeu = $this->_db->prepare("INSERT INTO comp_alerte_jeu(id_alerte,id_article,date)
                                                    VALUES(:id_alerte,:id_article,:date)");
            
            $addCompAlerteJeu->execute(array(
                "id_alerte" => $this->_db->lastInsertId(),
                "id_article" => $jeu->id(),
                "date" => $alerte->date()
            ));
        }
        
        
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
    
    public function deleteJeu(Jeu $jeu)
    {
        // ==================== ON SUPPRIME : LE LIEN QUI LIE L'ARTICLE / EMPRUNT AU ALERTE  =========================//        
        $deleteCompAlerteJeu = $this->_db->prepare("DELETE FROM comp_alerte_jeu
                                        WHERE id_article = :id_article");
        $deleteCompAlerteJeu->execute(array(
            "id_article" => $jeu->id()));
        
        // ==================== ON SUPPRIME : LES EMPRUNTS DU JEU  =========================//
        $deleteEmprunt = $this->_db->prepare("DELETE FROM emprunt
                                        WHERE id_article = :id_article");
        $deleteEmprunt->execute(array(
            "id_article" => $jeu->id()));
        
        // ==================== ON SUPPRIME : LES ALERTES DU JEU  =========================//
        
        foreach($jeu->alertes() as $alerte)
        {
            $deleteAlerte = $this->_db->prepare("DELETE FROM alerte
                                        WHERE id = :id");
            $deleteAlerte->execute(array(
                "id" => $alerte->id()));
        }

        // ==================== ON SUPPRIME : L'ARTICLE   =========================//
        $deleteArticle = $this->_db->prepare("DELETE FROM article
                                        WHERE id = :id");
        $deleteArticle->execute(array(
            "id" => $jeu->id()));
    }
    
    public function readJeu($info)
    {
        // ==================== ON PEUPLE AVEC : INFOS DE BASE DU JEU =========================//
        
        $resultJeu = $this->_db->query('SELECT article.date_ajout, article.prix_achat, article.id, article.commentaire,
                                article.id_fiche_article FROM article
                                INNER JOIN fiche_article ON fiche_article.id = article.id_fiche_article
                                INNER JOIN fiche_jeu ON fiche_jeu.id_fiche_article = fiche_article.id
                                WHERE article.id = '.$info);
        
        $donnees = $resultJeu->fetch(PDO::FETCH_ASSOC);

        $jeu = new Jeu($donnees);
        
        // ==================== ON PEUPLE AVEC : UNE FICHE JEU ================================//
        
        $ficheJeuManager = new FicheJeuManager();
        $ficheJeu = $ficheJeuManager->readFicheJeu($donnees["id_fiche_article"]);

        $jeu->setFiche_article($ficheJeu);
        
        // ==================== ON PEUPLE AVEC : DES ALERTES ================================//
       
        $resultAlerte = $this->_db->prepare('SELECT * FROM alerte
                                           INNER JOIN comp_alerte_jeu ON comp_alerte_jeu.id_alerte = alerte.id
                                           WHERE comp_alerte_jeu.id_article = :id_article');
        $resultAlerte->execute(array(
                              "id_article" => $info));
        
        while($alerte = $resultAlerte->fetch())
        {
            $alerteInstance  = new AlerteJeu($alerte);
            
            if($alerteInstance->date() != NULL)
            {
                $adherentManager = new PersonneManager();
                $resultAdherentAlerte = $this->_db->prepare('SELECT * FROM emprunt
                                                     WHERE date_emprunt = :date_emprunt');
                $resultAdherentAlerte->execute(array(
                    "date_emprunt" => $alerteInstance->date()));
                
                $donnesResultAdherentAlerte = $resultAdherentAlerte->fetch(PDO::FETCH_ASSOC);
                
                $alerteInstance->setAdherent($adherentManager->readAdherent($donnesResultAdherentAlerte["id_adherent"]));
            }
            
            $jeu->setAlertes($alerteInstance);
        }

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
    
    public function readCountJeux($id_fiche_jeu)
    {
        $resultatRequeteCountJeu = $this->_db->prepare('SELECT COUNT(*) as count_article FROM article 
                                                      WHERE id_fiche_article = :id_fiche_article');
        
        $resultatRequeteCountJeu->execute(["id_fiche_article" => $id_fiche_jeu]);
        
        $nombreDeJeu = $resultatRequeteCountJeu->fetch();
        
        return $nombreDeJeu["count_article"];
    }
    
    public function readAllCountJeux()
    {
        $resultatRequeteCountJeu = $this->_db->query('SELECT COUNT(id_fiche_article) as count_article FROM article');
        $nombreDeJeu = $resultatRequeteCountJeu->fetch();
        // echo "la" + $nombreDeJeu;
        echo "ici" + $nombreDeJeu["count_article"];
        
        //return $nombreDeJeu["count_article"];
    }
    
    public function countJeux()
    {
        return $this->_db->query("SELECT COUNT(*) FROM adherent")->fetchColumn();
    }
}