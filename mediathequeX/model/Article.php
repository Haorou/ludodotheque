<?php
abstract class Article
{
    private $_estEndommage;
    private $_estEmprunte;
    
    //-------------------------constructeur----------------------------------
    
    public function __construct(array $donnes)
    {
        $this->hydrate($donnes);
    }
    
    /*
    public function hydrate(array $donnes)
    {
        foreach($donnes as $cles => $values)
        {
            $method = "set" .ucfirst($cles);
            
            if(method_exists($this,$method))
            {
                $this->$method($values);
            }
        }
    }
    */
    
    //-----------------------------methode--------------------------------------
    
    
    //-----------------------------getter and setter---------------------------------------------
    
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