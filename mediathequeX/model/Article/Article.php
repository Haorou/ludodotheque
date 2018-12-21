<?php // Julien
abstract class Article
{
    private $_id = 0;
    private $_estEmprunte = false;
    private $_aReparer = false;

    private $_dateAjout = "";
    private $_prixAchat = 0;
    private $_commentaire = "";
    
    private $_ficheArticle = NULL;
    
    //--------------------------Constructeur---------------------------//
    
    //----------------------------Methodes-----------------------------//
    
    
    //----------------------Getters and Setters------------------------//
    
    
    public function id() { return $this->_id; }
    
    public function setId($id)
    {
        $id = (int)$id;
        
        $this->_id = $id;
    }
    
    public function estEmprunte() { return $this->_estEmprunte; }
    
    public function setEstEmprunte($estEmprunte)
    {
        $estEmprunte = (bool)$estEmprunte;
        
        $this->_estEmprunte = $estEmprunte;
    }
    
    public function aReparer() { return $this->_aReparer; }
    
    public function setAReparer($aReparer)
    {
        $aReparer = (bool)$aReparer;
        
        $this->_aReparer = $aReparer;
    }

    public function dateAjout() { return $this->_dateAjout; }
    
    public function setDateAjout($dateAjout)
    {
        $this->_dateAjout = $dateAjout;
    }
    
    
    public function prixAchat() { return $this->_prixAchat; }
    
    public function setPrixAchat($prixAchat)
    {
        $this->_prixAchat = $prixAchat;
    }
    public function commentaire() { return $this->_commentaire; }
    
    public function setCommentaire($commentaire)
    {
        $this->_commentaire = $commentaire;
    }
    
    public function ficheArticle() { return $this->_ficheArticle; }
    
    public function setFicheArticle(FicheArticle $ficheArticle)
    {
        $this->_ficheArticle = $ficheArticle;
    }
}