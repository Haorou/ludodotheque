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
            $addEmpruntArticle = $this->_db->prepare("INSERT INTO emprunt(id_article, id_adherent, date_emprunt, commentaire)
                                            VALUES(:id_article, :id_adherent, :date_emprunt, :commentaire)");
            $addEmpruntArticle->execute(array(
                "id_article" => $empruntArticle->article()->id(),
                "id_adherent" => $empruntArticle->adherent()->id(),
                "date_emprunt" => $empruntArticle->date_emprunt(),
                "commentaire" => $empruntArticle->commentaire()
            ));
        }
        
        public function updateEmprunt(Emprunt $empruntArticle)
        {
            $updateEmprunt = $this->_db->prepare("UPDATE emprunt SET
                                                    date_retour_effectif = :date_retour_effectif,
                                                    commentaire = :commentaire WHERE 
                                                    id_article = :id_article 
                                                    AND date_emprunt = :date_emprunt
                                                    AND id_adherent = :id_adherent");
            $updateEmprunt->execute(array(
                "date_retour_effectif" => $empruntArticle->date_retour_effectif(),
                "commentaire" => $empruntArticle->commentaire(),
                "id_article" => $empruntArticle->article()->id(),
                "id_adherent" => $empruntArticle->adherent()->id(),
                "date_emprunt" => $empruntArticle->date_emprunt()
            ));
        }

        
        public function readAllEmpruntsAdherent(Adherent $perso)
        {
            $requeteEmprunts = $this->_db->prepare('SELECT * FROM emprunt
                                      WHERE emprunt.id_adherent = :id');
            
            $requeteEmprunts->execute(['id' => $perso->id()]);
            
            $listeEmprunts = [];
            
            while($requeteEmprunt = $requeteEmprunts->fetch())
            {
                $listeEmprunts = new Emprunt($requeteEmprunt);
            }
            
            return $listeEmprunts;
        }
        
        public function readCurrentEmpruntsAdherent(Adherent $perso)
        {
            $requeteEmprunts = $this->_db->prepare('SELECT * FROM emprunt
                                      WHERE id_adherent = :id AND emprunt.date_retour_effectif IS NULL');
            
            $requeteEmprunts->execute(['id' => $perso->id()]);
            
            $listeEmprunts = [];
            
            $jeuManager = new JeuManager();
            while($requeteEmprunt = $requeteEmprunts->fetch())
            {
                $emprunt = new Emprunt($requeteEmprunt);
                $emprunt->setAdherent($perso);
                $emprunt->setArticle($jeuManager->readJeu($requeteEmprunt["id_article"]));
                
                $listeEmprunts[] = $emprunt;
            }
            
            return $listeEmprunts;
        }
        
        public function readCurrentEmpruntsAdherentAndArticle(Adherent $perso, Article $article)
        {
            $requeteEmprunts = $this->_db->prepare('SELECT * FROM emprunt
                                      WHERE id_adherent = :id_adherent
                                      AND id_article = :id_article
                                      AND emprunt.date_retour_effectif IS NULL');
            
            $requeteEmprunts->execute([
                'id_adherent' => $perso->id(),
                'id_article' => $article->id()
            ]);
            
           
            $jeuManager = new JeuManager();
            while($requeteEmprunt = $requeteEmprunts->fetch())
            {
                $emprunt = new Emprunt($requeteEmprunt);
                $emprunt->setAdherent($perso);
                $emprunt->setArticle($jeuManager->readJeu($requeteEmprunt["id_article"]));
            }
            
            return $emprunt;
        }
        
        public function readAllEmpruntsArticle(Article $article)
        {
            $requeteEmprunts = $this->_db->prepare('SELECT * FROM emprunt
                                      WHERE id_article = :id');
            
            $requeteEmprunts->execute(['id' => $article->id()]);
            
            $listeEmprunts = [];
            
            $adherentManager = new PersonneManager();
            while($requeteEmprunt = $requeteEmprunts->fetch())
            {
                $emprunt = new Emprunt($requeteEmprunt);
                $emprunt->setAdherent($adherentManager->readAdherent($requeteEmprunt["id_adherent"]));
                $emprunt->setArticle($article);
                
                $listeEmprunts[] = $emprunt;
            }
            
            return $listeEmprunts;
        }
        
        public function readAllCurrentEmprunts()
        {
            $requeteEmprunts = $this->_db->prepare('SELECT * FROM emprunt
                                                  WHERE date_retour_effectif IS NULL');
            
            $requeteEmprunts->execute();
            
            $listeEmprunts = [];
            
            $adherentManager = new PersonneManager();
            $jeuManager = new JeuManager();
            while($requeteEmprunt = $requeteEmprunts->fetch())
            {
                $emprunt = new Emprunt($requeteEmprunt);
                $emprunt->setAdherent($adherentManager->readAdherent($requeteEmprunt["id_adherent"]));
                $emprunt->setArticle($jeuManager->readJeu($requeteEmprunt["id_article"]));
                
                $listeEmprunts[] = $emprunt;
            }
            
            return $listeEmprunts;
        }
        
        public function deleteEmprunts(Emprunt $emprunt)
        {
            $requeteEmprunts = $this->_db->prepare('DELETE FROM emprunt
                                      WHERE emprunt.id_article = :id AND emprunt.date_emprunt = :date_emprunt');
            
            $requeteEmprunts->execute([
                'id' => $emprunt->id(),
                'date_emprunt' => $emprunt->date_emprunt()
            ]);
            
            $listeEmprunts = [];
            
            while($requeteEmprunt = $requeteEmprunts->fetch())
            {
                $listeEmprunts = new Emprunt($requeteEmprunt);
            }
            
            return $listeEmprunts;
        }
        
        
        public function countEmprunt()
        {
            return $this->_db->query("SELECT COUNT(*) FROM emprunt")->fetchColumn();
        }
        
    }