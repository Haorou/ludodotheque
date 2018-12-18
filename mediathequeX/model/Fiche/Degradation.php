<?php
class Degradation
{
    private $_estPresent;
    private $_estNeuf;

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
    
    public function estPresent()
    {
        return $this->_estPresent;
    }
    
    public function setEstPresent($estPresent)
    {
        $estPresent = (bool)$estPresent;
        $this->_estPresent = $estPresent;
    }
    
    public function estNeuf()
    {
        return $this->_estNeuf;
    }
    
    public function setEstNeuf($estNeuf)
    {
        $estNeuf = (bool)$estNeuf;
        $this->_estNeuf = $estNeuf;
    }
}