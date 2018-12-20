<?php
class Utilisateur
{
    private $_id = 0;
    private $_pseduo = "";
    private $_motDePasse = "";
    private $_privilege = 0;
    
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
    
    public function pseudo() { return $this->_pseudo; }
    
    public function setPseudo($pseudo)
    {
        $pseudo = (string)$pseudo;
        
        $this->_pseudo = $pseudo;
    }
    
    public function motDePasse() { return $this->_motDePasse; }
    
    public function setMotDePasse($motDePasse)
    {
        $motDePasse = (string)$motDePasse;
        
        $this->_motDePasse = $motDePasse;
    }
    
    public function privilege() { return $this->_privilege; }
    
    public function setPrivilege($privilege)
    {
        $privilege = (int)$privilege;
        
        $this->_privilege = $privilege;
    }
}