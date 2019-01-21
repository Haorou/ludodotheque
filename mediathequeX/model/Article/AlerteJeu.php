<?php // Julien
class AlerteJeu
{
    private $_id;
    
    private $_adherent = NULL;
    private $_date = NULL;
    private $_element_jeu = "";
    private $_probleme = "";
    private $_couleur = "";
    private $_quantite = 0;
    private $_commentaire = "";
    
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
    
    public function id() { return $this->_id; }
    
    public function setId($id)
    {
        $id = (int)$id;
        
        $this->_id = $id;
    }
    
    public function adherent() { return $this->_adherent; }
    
    public function setAdherent(Adherent $adherent)
    {
        $this->_adherent = $adherent;
    }
    
    public function date() { return $this->_date; }
    
    public function setDate($dateEmprunt)
    {
        $this->_date = $dateEmprunt;
    }
    
    public function element_jeu() { return $this->_element_jeu; }
    
    public function setElement_jeu($element_jeu)
    {
        $this->_element_jeu = $element_jeu;
    }
    
    public function probleme() { return $this->_probleme; }
    
    public function setProbleme($probleme)
    {
        $this->_probleme = $probleme;
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
    
    public function commentaire() { return $this->_commentaire; }
    
    public function setCommentaire($commentaire)
    {
        $this->_commentaire = $commentaire;
    }

    function __toString()
    {
        $ale = "</br>Je suis une AlerteJeu</br>";
        $ale .= "id = ".$this->id()."</br>";
        
        $ale .= $this->adherent();

        $ale .= "date_emprunt = ".$this->date()."</br>";
        $ale .= "element_jeu = ".$this->element_jeu()."</br>";
        $ale .= "probleme = ".$this->probleme()."</br>";
        $ale .= "couleur = ".$this->couleur()."</br>";
        $ale .= "quantite = ".$this->quantite()."</br>";
        $ale .= "commentaire = ".$this->commentaire()."</br>";
        
        return $ale;
    }
}