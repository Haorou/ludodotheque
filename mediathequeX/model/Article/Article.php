<?php // Julien
abstract class Article
{
    private $_estEndommage = false;
    private $_estEmprunte = false;
    private $_ficheArticle = NULL;
    
    //--------------------------Constructeur---------------------------//
    
    //----------------------------Methodes-----------------------------//
    
    
    //----------------------Getters and Setters------------------------//
    
    
    public function estEndommage() { return $this->_estEndommage; }
    
    public function setEstEndommage($estEndommage)
    {
        $estEndommage = (bool)$estEndommage;
        
        $this->_estEndommage = $estEndommage;
    }
    
    public function estEmprunte() { return $this->_estEmprunte; }
    
    public function setEstEmprunte($estEmprunte)
    {
        $estEmprunte = (bool)$estEmprunte;
        
        $this->_estEmprunte = $estEmprunte;
    }
    
    public function ficheArticle() { return $this->_ficheArticle; }
    
    public function setFicheArticle(FicheArticle $ficheArticle)
    {
        $this->_ficheArticle = $ficheArticle;
    }
}