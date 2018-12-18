<?php
abstract class AdherentPrincipal
{
    private $_renouveller_adhesions = false;
    private $_chequeEstDepose = false;
    private $_coordonnees;
    private $_date_adhesions = array ();
    
    //-------------------------constructeur----------------------------------
    
    public function __construct(array $donnes)
    {
        $this->hydrate($donnes);
    }
    
    //-----------------------------methode--------------------------------------
    
    function isChequeDepose() {
        return $this->_chequeEstDepose = true;
    }

    function isrenouveller_adhesions() {
        return $this->_renouveller_adhesions = true;
    }
    
    //-----------------------------getter and setter---------------------------------------------
    
    
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
        
        $this->_renouveller_adhesions = $renouvellerAdhesion;
    }
}
?>