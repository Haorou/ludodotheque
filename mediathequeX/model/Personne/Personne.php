<?php //Gaetan
abstract class Personne
{
    private $_id = 0;
    private $_civilite = "";
    private $_nom = "";
    private $_prenom = "";
    
    //--------------------------Constructeur---------------------------//
    
    //----------------------------Methodes-----------------------------//
    
    
    //----------------------Getters and Setters------------------------//
    
    public function id() { return $this->_id; }
    
    public function setId($id)
    {
        $id = (int)$id;
        
        $this->_id = $id;
    }
    
    public function civilite() { return $this->_civilite; }
    
    public function setCivilite($civilite)
    {
        $civilite = (string)$civilite;
        
        $this->_civilite = $civilite;
    }
    
    
    public function nom() { return $this->_nom; }
    
    public function setNom($nom)
    {
        $nom = (string)$nom;
        
        $this->_nom = $nom;
    }
    
    public function prenom() { return $this->_nom; }
    
    public function setPrenom($prenom)
    {
        $prenom = (string)$prenom;
        
        $this->_prenom = $prenom;
    }
}