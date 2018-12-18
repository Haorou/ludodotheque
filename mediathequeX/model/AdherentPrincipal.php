<?php
abstract class AdherentPrincipal
{
    private $_renouveller_adhesions;
    private $_chequeestDepose;
    private $_coordonnees;
    
    public function __construct(array $donnes)
    {
        $this->hydrate($donnes);
    }
    
    
    
    public function setNom($nom)
    {
        $nom = (string)$nom;
        
        $this->_nom = $nom;
    }
    
    public function setPrenom($prenom)
    {
        $prenom = (string)$prenom;
        
        $this->_prenom = $prenom;
    }
}
?>