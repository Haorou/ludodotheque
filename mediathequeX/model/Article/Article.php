<?php // Julien
abstract class Article
{
    private $_id = 0;
    private $_est_emprunte = false;
    private $_a_reparer = false;

    private $_date_ajout = "";
    private $_prix_achat = 0;
    private $_commentaire = "";
    
    private $_fiche_article = NULL;
    
    //--------------------------Constructeur---------------------------//
    
    //----------------------------Methodes-----------------------------//
    
    
    //----------------------Getters and Setters------------------------//
    
    
    public function id() { return $this->_id; }
    
    public function setId($id)
    {
        $id = (int)$id;
        
        $this->_id = $id;
    }
    
    public function est_emprunte() { return $this->_est_emprunte; }
    
    public function set_est_emprunte($estEmprunte)
    {
        $estEmprunte = (bool)$estEmprunte;
        
        $this->_est_emprunte = $estEmprunte;
    }
    
    public function a_reparer() { return $this->_a_reparer; }
    
    public function setA_reparer($aReparer)
    {
        $aReparer = (bool)$aReparer;
        
        $this->_a_reparer = $aReparer;
    }

    public function date_ajout() { return $this->_date_ajout; }
    
    public function setDate_ajout($dateAjout)
    {
        $this->_date_ajout = $dateAjout;
    }
    
    
    public function prix_achat() { return $this->_prix_achat; }
    
    public function setPrix_achat($prixAchat)
    {
        $this->_prix_achat = $prixAchat;
    }
    public function commentaire() { return $this->_commentaire; }
    
    public function setCommentaire($commentaire)
    {
        $this->_commentaire = $commentaire;
    }
    
    public function fiche_article() { return $this->_fiche_article; }
    
    public function setFiche_article(FicheArticle $ficheArticle)
    {
        $this->_fiche_article = $ficheArticle;
    }
}