<?php
abstract class ElementDuJeu
{
    private $_degradation = NULL;

    //--------------------------Constructeur---------------------------//
    
    //----------------------------Methodes-----------------------------//

    //----------------------Getters and Setters------------------------//
    
    public function degradation() { return $this->_degration; }
    
    public function setDegradation(Degradation $degradation)
    {
        $this->_degration = $degradation;
    }
}