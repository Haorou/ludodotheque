<?php

class FicheJeu{
    private $_nbreJoueursMin;
    private $_nbreJoueursMax;
    private $_reglesDuJeu;
    
    
    //--------------------------Constructeur---------------------------//
    
    
    
    //----------------------------Methodes-----------------------------//
    
    
    //----------------------Getters and Setters------------------------//
    public function nbreJoueurMin() {
        return $this->_nbreJoueursMin;
    }
    
    public function setNbreJoueurMin($_nbreJoueursMin){
        $_nbreJoueursMin = (bool)$_nbreJoueursMin;
        return $this->_nbreJoueursMin = $_nbreJoueursMin;
    }
    
    public function nbreJoueurMax(){
        return $this->_nbreJoueursMax;
    }
    
    public function setNbreJoueurMax($_nbreJoueursMax){
        $_nbreJoueursMax = (bool)$_nbreJoueursMax;
        return $this->_nbreJoueursMax = $_nbreJoueursMax;
    }
    
    public function reglesDuJeu() {
        return $this->_reglesDuJeu;
    }
    
    public function setReglesDuJeu($regleDuJeu) {
        $regleDuJeu = (string)$regleDuJeu;
        $this->_reglesDuJeu = $regleDuJeu;
    }
}
    
    
    
    
    
    
