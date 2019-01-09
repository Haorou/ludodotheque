<?php
class Utilisateur
{
    private $_id = 0;
    private $_pseudo = "";
    private $_mot_de_passe = "";
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
    
    public function mot_de_passe() { return $this->_mot_de_passe; }
    
    public function setMot_de_passe($motDePasse)
    {
        $motDePasse = (string)$motDePasse;
        
        $this->_mot_de_passe = $motDePasse;
    }
    
    public function privilege() { return $this->_privilege; }
    
    public function setPrivilege($privilege)
    {
        $privilege = (int)$privilege;
        
        $this->_privilege = $privilege;
    }
}