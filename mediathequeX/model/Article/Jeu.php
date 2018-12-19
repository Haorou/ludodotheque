<?php

class Jeu extends Article
{
    private $_elementsDuJeuProbleme = array();
    
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
    
    public function elementsDuJeuProbleme() { return $this->_elementsDuJeuProbleme; }
    
    public function setElementsDuJeuProbleme(ElementsDuJeuProbleme $elementsDuJeuProbleme)
    {
        $this->_elementsDuJeuProbleme = $elementsDuJeuProbleme;
    }
}
