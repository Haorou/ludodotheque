<?php // Julien
abstract class Article
{
    private $_estEndommage;
    private $_estEmprunte;
    
    //--------------------------Constructeur---------------------------//
    
    //----------------------------Methodes-----------------------------//
    
    
    //----------------------Getters and Setters------------------------//
    
    
    public function estEndommage() { return $this->_estEndommage; }
    
    public function estEmprunte() { return $this->_estEmprunte; }
    
    public function setEstEndommage($estEndommage)
    {
        $estEndommage = (bool)$estEndommage;
        
        $this->_estEndommage = $estEndommage;
    }
    
    public function setEstEmprunte($estEmprunte)
    {
        $estEmprunte = (bool)$estEmprunte;
        
        $this->_estEmprunte = $estEmprunte;
    }
}