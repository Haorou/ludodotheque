<?php // Julien
class AlerteJeu
{   
    private $_id;
    
    private $_adherent = NULL;
    private $_date_emprunt = "";
    private $_element_du_jeu = "";
    private $_probleme = "";
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
    
    public function dateEmprunt() { return $this->_dateEmprunt; }
    
    public function setDateEmprunt($dateEmprunt)
    {
        $this->_dateEmprunt = $dateEmprunt;
    }
    
    public function element_du_jeu() { return $this->_element_du_jeu; }
    
    public function setElement_du_jeu($element_du_jeu)
    {
        $this->_element_du_jeu = $element_du_jeu;
    }
    
    public function probleme() { return $this->_probleme; }
    
    public function setProbleme($probleme)
    {
        $this->_probleme = $probleme;
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
}