<?php
class Alerte
{
    const ARTICLE = 1;
    const NON_REPERTORIE = 2;
    const PION = 3;
    const PLATEAU = 4;
    const NOTICE = 5;
    const CARTE = 6;
    const SABLIER = 7;
    const BOITE = 8;
    const DE = 9;
    
    private $_id;
    
    private $_designation = 0;
    private $_quantite = 0;
    private $_commentaire = 0;
    private $_adherent = NULL;
    
    private $_estPresent = true;
    private $_estEnBonneEtat = true;

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
    
    public function designation() { return $this->_designation; }
    
    public function setDesignation($designation)
    {
        $this->_designation = $designation;
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
    
    public function estPresent() { return $this->_estPresent; }
    
    public function setEstPresent($estPresent)
    {
        $estPresent = (bool)$estPresent;
        $this->_estPresent = $estPresent;
    }
    
    public function estEnBonneEtat() { return $this->_estEnBonneEtat; }
    
    public function setEstEnBonneEtat($estEnBonneEtat)
    {
        $estEnBonneEtat = (bool)$estEnBonneEtat;
        $this->_estEnBonneEtat = $estEnBonneEtat;
    }
    
    public function adherent() { return $this->_adherent; }
    
    public function setAdherent(Adherent $adherent)
    {
        $this->_adherent = $adherent;
    }
}