<?php
class ElementsDuJeu
{   
    private $_id_fiche_jeu = 0;
    private $_element_jeu = "";
    private $_couleur = "";
    private $_quantite = 0;

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
    
    public function id_fiche_jeu() { return $this->_id_fiche_jeu; }
    
    public function setId_fiche_jeu($id)
    {
        $id = (int)$id;
        
        $this->_id_fiche_jeu = $id;
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
        $edj .= "id_fiche_jeu = ".$this->id_fiche_jeu()."</br>";
        $edj .= "element_jeu = ".$this->element_jeu()."</br>";
        $edj .= "couleur = ".$this->couleur()."</br>";
        $edj .= "quantite = ".$this->quantite()."</br>";
        
        return $edj;
    }
}