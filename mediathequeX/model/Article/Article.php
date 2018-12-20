<?php // Julien
abstract class Article
{
    private $_id = 0;
    private $_estEndommage = false;
    private $_estEmprunte = false;
    
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