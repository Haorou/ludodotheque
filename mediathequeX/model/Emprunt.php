<?php
class Emprunt
{
    private $_dateEmprunt;
    private $_estEnRetard;
    
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
    
    public function dateEmprunt() { return $this->_dateEmprunt; }
    
    public function estEnRetard() { return $this->_estEnRetard; }

    public function setDateEmprunt($date)
    {
        // Verifier si DateEmprunt est valide (if $date === ???)
        $this->_dateEmprunt = $date;
    }
    
    public function setEstEnRetard($estEndRetard)
    {
        $estEndRetard = (bool)$estEndRetard;
        
        $this->_estEnRetard = $estEndRetard;
    }
    
}