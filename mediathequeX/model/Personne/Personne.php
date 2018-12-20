<?php //Gaetan
abstract class Personne
{
    private $_id = 0;
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