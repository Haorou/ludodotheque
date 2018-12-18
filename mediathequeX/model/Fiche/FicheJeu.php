<?php

// Designed by Mesguen Frédéric

class FicheJeu extends FicheArticle
{

    private $_nbreJoueursMin = 0;
    private $_nbreJoueursMax = 0;
    private $_reglesDuJeu = "";
    
    
    //--------------------------Constructeur---------------------------//
    
    public function __construct(array $donnes)
    {
        $this->hydrate($donnes);
    }
    
    public function hydrate(array $donnes)
    {
        foreach($donnes as $cles => $values)
        {
            $method = "set" .ucfirst($cles);
            
            if(method_exists($this,$method))
            {
                $this->$method($values);
            }
        }
    }
    
    //----------------------------Methodes-----------------------------//
    
    
    //----------------------Getters and Setters------------------------//
    public function nbreJoueurMin() { return $this->_nbreJoueursMin; }
    
    public function setNbreJoueurMin($_nbreJoueursMin){
        $_nbreJoueursMin = (int)$_nbreJoueursMin;
        return $this->_nbreJoueursMin = $_nbreJoueursMin;
    }
    
    public function nbreJoueurMax() { return $this->_nbreJoueursMax; }
    
    public function setNbreJoueurMax($_nbreJoueursMax) {
        $_nbreJoueursMax = (int)$_nbreJoueursMax;
        return $this->_nbreJoueursMax = $_nbreJoueursMax;
    }
    
    public function reglesDuJeu() { return $this->_reglesDuJeu; }
    
    public function setReglesDuJeu($regleDuJeu) {
        $regleDuJeu = (string)$regleDuJeu;
        $this->_reglesDuJeu = $regleDuJeu;
    }
}