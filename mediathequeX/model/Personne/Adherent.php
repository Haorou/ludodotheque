<?php //Gaetan
class Adherent extends Personne
{
    private $_adhesionARenouveller = false;
    private $_chequeEstDepose = false;
    private $_coordonnees;
    private $_dateAdhesions = array ();
    
    //--------------------------Constructeur---------------------------//
    
    public function __construct(array $donnes)
    {
        $this->hydrate($donnes);
    }
    
    //----------------------------Methodes-----------------------------//
    
    function isChequeDepose() {
        return $this->_chequeEstDepose = true;
    }
    function isAdhesionARenouveller() {
        return $this->_adhesionARenouveller = true;
    }
    
    //----------------------Getters and Setters------------------------//
  
    public function adhesionARenouveller()
    {
        return $this->_adhesionARenouveller;
    }
    
    public function setAdhesionARenouveller($adhesionARenouveller)
    {
        $adhesionARenouveller = (bool)$adhesionARenouveller;
        
        $this->_adhesionARenouveller = $adhesionARenouveller;
    }
    
    public function chaqueEstDepose()
    {
        return $this->_chequeEstDepose;
    }
    
    public function setChequeEstDepose($chequeEstDepose)
    {
        $chequeEstDepose = (bool)$chequeEstDepose;
        
        $this->_prenom = $chequeEstDepose;
    }
    
    public function coordonnees()
    {
        return $this->_coordonnees;
    }
    
    public function setCoordonnees($coordonnees)
    {
        $coordonnees = (string)$coordonnees;
        
        $this->_coordonnees = $coordonnees;
    }
    
    public function dateAdhesions()
    {
        return $this->_dateAdhesion;
    }
    
    public function setDateAdhesions($dateAdhesion)
    {
        $dateAdhesion = (string)$dateAdhesion;
        $this->_dateAdhesion = $dateAdhesion;
    }
}
