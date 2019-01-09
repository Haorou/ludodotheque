<?php

class Jeu extends Article
{
    private $_alertes = array();
    
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
    
    public function alertes() { return $this->_alertes; }
    
    public function setAlertes(AlerteJeu $alerte)
    {
        $this->_alertes[] = $alerte;
    }
 
    private $_fiche_article = NULL;
    private $_alertes = array();
    function __toString()
    {
        $jeu = "</br>Je suis un Jeu</br>";
        $jeu .= "id = ".$this->id()."</br>";
        $jeu .= "est_emprunte = ".$this->est_emprunte()."</br>";
        $jeu .= "a_reparer = ".$this->a_reparer()."</br>";
        $jeu .= "date_ajout = ".$this->date_ajout()."</br>";
        $jeu .= "prix_achat = ".$this->prix_achat()."</br>";
        $jeu .= "commentaire = ".$this->commentaire()."</br>";
        
        $jeu .= $this->fiche_article();
        
        foreach($this->alertes() as $alerte)
        {
            $jeu .= $alerte;
        }
        
        return $jeu;
    }
}
