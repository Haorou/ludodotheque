<?php
abstract class ElementDuJeu
{
    private $_degradation;
    
    //--------------------------Constructeur---------------------------//
    
    //----------------------------Methodes-----------------------------//
    
    //----------------------Getters and Setters------------------------//
    
    public function degradation()
    {
        return $this->_degration;
    }
    
    public function setDegradation($degradation)
    {
        $this->_degration = $degradation;
    }
}