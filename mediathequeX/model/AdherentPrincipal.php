<?php //Gaetan
abstract class AdherentPrincipal
{
    private $_renouvellerAdhesions = false;
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
    function isrenouveller_adhesions() {
        return $this->_renouvellerAdhesions = true;
    }
    
    //----------------------Getters and Setters------------------------//
    
    public function setCoordonnees($coordonnees)
    {
        $coordonnees = (string)$coordonnees;
        
        $this->_coordonnees = $coordonnees;
    }
    
    public function setChequeEstDepose($chequeEstDepose)
    {
        $chequeEstDepose = (bool)$chequeEstDepose;
        
        $this->_prenom = $chequeEstDepose;
    }
    
    public function setRenouvellerAdhesion($renouvellerAdhesion)
    {
        $renouvellerAdhesion = (bool)$renouvellerAdhesion;
        
        $this->_renouvellerAdhesions = $renouvellerAdhesion;
    }
}
?>