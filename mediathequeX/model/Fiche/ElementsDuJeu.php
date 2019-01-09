<?php
class ElementsDuJeu
{        
    private $_element_jeu = "";
    private $_couleur = "";
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
    
    public function element_jeu() { return $this->_element_jeu; }
    
    public function setElement_jeu($element_du_jeu)
    {
        $this->_element_jeu = $element_du_jeu;
    }
    
    public function couleur() { return $this->_couleur; }
    
    public function setCouleur($couleur)
    {
        $this->_couleur = $couleur;
    }
    
    public function quantite() { return $this->_quantite; }
    
    public function setQuantite($quantite)
    {
        $this->_quantite = $quantite;
    }
    
    function __toString()
    {
        $edj = "</br>Je suis un ElementsDuJeu</br>";
        $edj .= "id = ".$this->id()."</br>";
        $edj .= "civilite = ".$this->element_jeu()."</br>";
        $edj .= "nom = ".$this->couleur()."</br>";
        $edj .= "prenom = ".$this->quantite()."</br>";
        
        return $edj;
    }
}