<?php

// Designed by Mesguen Fr�d�ric

class FicheJeu extends FicheArticle
{    
    private $_nombre_de_joueurs_min = 0;
    private $_nombre_de_joueurs_max = 0;
    private $_duree_min_de_jeu = 0;
    private $_duree_max_de_jeu = 0;
    private $_descriptif = "";
    
    private $_elements_du_jeu = array();
    private $_types_de_jeu = array();
    
    
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
    public function nombre_de_joueurs_min() { return $this->_nombre_de_joueurs_min; }
    
    public function setNombre_de_joueurs_min($_nbreJoueursMin){
        $_nbreJoueursMin = (int)$_nbreJoueursMin;
        return $this->_nombre_de_joueurs_min = $_nbreJoueursMin;
    }
    
    public function nombre_de_joueurs_max() { return $this->_nombre_de_joueurs_max; }
    
    public function setNombre_de_joueurs_max($_nbreJoueursMax) {
        $_nbreJoueursMax = (int)$_nbreJoueursMax;
        return $this->_nombre_de_joueurs_max = $_nbreJoueursMax;
    }
    
    public function duree_min_de_jeu() { return $this->_duree_min_de_jeu; }
    
    public function setDuree_min_de_jeu($dureeMinDeJeu){
        $dureeMinDeJeu = (int)$dureeMinDeJeu;
        return $this->_duree_min_de_jeu = $dureeMinDeJeu;
    }
    
    public function duree_max_de_jeu() { return $this->_duree_max_de_jeu; }
    
    public function setDuree_max_de_jeu($dureeMaxDeJeu) {
        $dureeMaxDeJeu = (int)$dureeMaxDeJeu;
        return $this->_duree_max_de_jeu = $dureeMaxDeJeu;
    }
    
    public function descriptif() { return $this->_descriptif; }
    
    public function setDescriptif($descriptif) {
        $descriptif = (string)$descriptif;
        $this->_descriptif = $descriptif;
    }
    
    public function elements_du_jeu() { return $this->_elements_du_jeu; }
    
    public function setElements_du_jeu(ElementsDuJeu $elementsDuJeu) {
        $this->_elements_du_jeu = $elementsDuJeu;
    }
    
    public function types_de_jeu() { return $this->_types_de_jeu; }
    
    public function setTypes_de_jeu($typeDeJeu) {
        $this->_types_de_jeu = $typeDeJeu;
    }
}