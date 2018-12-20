<?php
abstract class ElementDuJeu
{    
    const PION = 1;
    const PLATEAU = 2;
    const NOTICE = 3;
    const CARTE = 4;
    const SABLIER = 5;
    const BOITE = 6;
    const DE = 7;
    
    private $_id = 0;
    
    private $_designation = 0;
    
    private $_quantite = 0;

    //--------------------------Constructeur---------------------------//
    
    //----------------------------Methodes-----------------------------//

    //----------------------Getters and Setters------------------------//
    
    public function id() { return $this->_id; }
    
    public function setId($id)
    {
        $id = (int)$id;
        
        $this->_id = $id;
    }
    
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
}