<?php
abstract class ElementsDuJeu
{    
    const PION = 1;
    const PLATEAU = 2;
    const NOTICE = 3;
    const CARTE = 4;
    const SABLIER = 5;
    const BOITE = 6;
    const DE = 7;
    
    private $_designation = 0;
    
    private $_quantite = NULL;

    //--------------------------Constructeur---------------------------//
    
    //----------------------------Methodes-----------------------------//

    //----------------------Getters and Setters------------------------//
    
    
    public function designation() { return $this->_designation; }
    
    public function setDesignation($designation)
    {
        $this->_designation = $designation;
    }
    
    public function quantite() { return $this->_quantite; }
    
    public function setQuantite($quantite)
    {
        $this->_quantite = $quantite;
    }
    
    
    /*
    private $_degradation = NULL;
    
    public function degradation() { return $this->_degration; }
    
    public function setDegradation(Degradation $degradation)
    {
        $this->_degration = $degradation;
    }*/
}