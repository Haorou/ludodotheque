<?php
abstract class Person
{
    private $_nom;
    private $_prenom;
    
    //-------------------------constructeur----------------------------------
    
    public function __construct(array $donnes)
    {
        $this->hydrate($donnes);
    }
    
    
    //-----------------------------methode--------------------------------------
    
    
    //-----------------------------getter and setter---------------------------------------------
    
    public function setNom($nom)
    {
        $nom = (string)$nom;
        
        $this->_nom = $nom;
    }
    
    public function setPrenom($prenom)
    {
        $prenom = (string)$prenom;
        
        $this->_prenom = $prenom;
    }
}
?>