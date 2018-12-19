<?php
class Degradation
{
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