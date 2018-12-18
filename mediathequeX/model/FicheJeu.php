<?php

class FicheJeu{
    private $_nbreJoueursMin;
    private $_nbreJoueursMax;
    private $_reglesDuJeu;
    
    
    
    
    
    public function getNbreJoueurMin() {
        return $this->_nbreJoueursMin;
    }
    
    public function setNbreJoueurMin($_nbreJoueursMin){
        $_nbreJoueursMin = (bool)$_nbreJoueursMin;
        return $this->_nbreJoueursMin = $_nbreJoueursMin;
    }
    
    public function getNbreJoueurMax(){
        return $this->_nbreJoueursMax;
    }
    
    public function setNbreJoueurMax($_nbreJoueursMax){
        $_nbreJoueursMax = (bool)$_nbreJoueursMax;
        return $this->_nbreJoueursMax = $_nbreJoueursMax;
    }
    
    public function getreglesDuJeu() {
        return $this->_reglesDuJeu;
    }
}
    
    
    
    
    
    
