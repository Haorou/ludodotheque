<?php

// Designed by Mesguen Frédéric

class FicheJeu extends FicheArticle
{

    const FAMILIALE = 1;
    const HASARD = 2;
    const JEU_DE_ROLE = 3;
    const STRATEGIE = 4;
    
    private $_nbreJoueursMin = 0;
    private $_nbreJoueursMax = 0;
    private $_dureeMinDeJeu = 0;
    private $_dureeMaxDeJeu = 0;
    private $_descriptif = "";
    
    private $_elementsDuJeu = array();
    private $_typesDeJeu = array();
    
    
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
    
    public function dureeMinDeJeu() { return $this->_dureeMinDeJeu; }
    
    public function setNDureeMinDeJeu($dureeMinDeJeu){
        $dureeMinDeJeu = (int)$dureeMinDeJeu;
        return $this->_dureeMinDeJeu = $dureeMinDeJeu;
    }
    
    public function dureeMaxDeJeu() { return $this->_dureeMaxDeJeu; }
    
    public function setDureeMaxDeJeu($dureeMaxDeJeu) {
        $dureeMaxDeJeu = (int)$dureeMaxDeJeu;
        return $this->_dureeMaxDeJeu = $dureeMaxDeJeu;
    }
    
    public function descriptif() { return $this->_descriptif; }
    
    public function setDescriptif($descriptif) {
        $descriptif = (string)$descriptif;
        $this->_descriptif = $descriptif;
    }
    
    public function elementsDuJeu() { return $this->_elementsDuJeu; }
    
    public function setReglesDuJeu(ElementDuJeu $elementDuJeu) {
        $this->_elementsDuJeu = $elementDuJeu;
    }
    
    public function typesDeJeu() { return $this->_typesDeJeu; }
    
    public function setTypesDeJeu($typeDeJeu) {
        $this->_typesDeJeu = $typeDeJeu;
    }
}