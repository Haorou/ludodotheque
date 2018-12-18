<?php //Gaetan
abstract class Personne
{
    private $_nom;
    private $_prenom;
    
    //--------------------------Constructeur---------------------------//
    
    public function __construct(array $donnes)
    {
        $this->hydrate($donnes);
    }
    
    
    //----------------------------Methodes-----------------------------//
    
    
    //----------------------Getters and Setters------------------------//
    
    public function nom()
    {
        return $this->_nom;
    }
    
    public function setNom($nom)
    {
        $nom = (string)$nom;
        
        $this->_nom = $nom;
    }
    
    public function prenom()
    {
        return $this->_nom;
    }
    
    public function setPrenom($prenom)
    {
        $prenom = (string)$prenom;
        
        $this->_prenom = $prenom;
    }
}