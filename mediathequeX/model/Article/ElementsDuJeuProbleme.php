<?php
class ElementsDuJeuProbleme
{
    const PION = 1;
    const PLATEAU = 2;
    const NOTICE = 3;
    const CARTE = 4;
    const SABLIER = 5;
    const BOITE = 6;
    const DE = 7;
    
    private $_designation = 0;
    private $_quantite = 0;
    
    private $_estPresent = false;
    private $_estEnBonneEtat = false;

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
}