<?php
class ElementsDuJeu
{        
    private $_element_du_jeu = "";
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
    
    public function element_du_jeu() { return $this->_element_du_jeu; }
    
    public function setElement_du_jeu($element_du_jeu)
    {
        $this->_element_du_jeu = $element_du_jeu;
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
}