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
        $this->_elements_du_jeu[] = $elementsDuJeu;
    }
    
    public function types_de_jeu() { return $this->_types_de_jeu; }
    
    public function setTypes_de_jeu($typeDeJeu) {
        $this->_types_de_jeu[] = $typeDeJeu;
    }
    
    function __toString()
    {
        $fic = "</br>Je suis une FicheJeu</br>";
        $fic .= "id = ".$this->id()."</br>";
        $fic .= "titre = ".$this->titre()."</br>";
        $fic .= "auteur = ".$this->auteur()."</br>";
        $fic .= "editeur = ".$this->editeur()."</br>";
        $fic .= "age_min = ".$this->age_min()."</br>";
        $fic .= "age_max = ".$this->age_max()."</br>";
        $fic .= "nombre_de_joueurs_min = ".$this->nombre_de_joueurs_min()."</br>";
        $fic .= "nombre_de_joueurs_max = ".$this->nombre_de_joueurs_max()."</br>";
        $fic .= "duree_min_de_jeu = ".$this->duree_min_de_jeu()."</br>";
        $fic .= "duree_max_de_jeu = ".$this->duree_max_de_jeu()."</br>";
        $fic .= "descriptif = ".$this->descriptif()."</br>";
        
        foreach($this->elements_du_jeu() as $element_du_jeu)
        {
            $fic .= $element_du_jeu;
        }

        foreach($this->types_de_jeu() as $type_de_jeu)
        {
            $fic .= $type_de_jeu;
        }
        
        return $fic;
    }
}