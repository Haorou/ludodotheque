<?php //Gaetan
class Adherent extends Personne
{
    private $_adhesionARenouveller = false;
    private $_chequeEstDepose = false;
    private $_adresse = NULL;
    private $_dateAdhesions = array ();
    private $_commentaire = "";
    
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
    
    function isChequeDepose() {
        return $this->_chequeEstDepose = true;
    }
    function isAdhesionARenouveller() {
        return $this->_adhesionARenouveller = true;
    }
    
    //----------------------Getters and Setters------------------------//
  
    public function adhesionARenouveller() { return $this->_adhesionARenouveller; }
    
    public function setAdhesionARenouveller($adhesionARenouveller)
    {
        $adhesionARenouveller = (bool)$adhesionARenouveller;
        
        $this->_adhesionARenouveller = $adhesionARenouveller;
    }
    
    public function chaqueEstDepose() { return $this->_chequeEstDepose; }
    
    public function setChequeEstDepose($chequeEstDepose)
    {
        $chequeEstDepose = (bool)$chequeEstDepose;
        
        $this->_prenom = $chequeEstDepose;
    }
    
    public function adresse() { return $this->_adresse; }
    
    public function setAdresse(Adresse $adresse)
    {        
        $this->_adresse = $adresse;
    }
    
    public function dateAdhesions() { return $this->_dateAdhesion; }
    
    public function setDateAdhesions($dateAdhesion)
    {
        $dateAdhesion = (string)$dateAdhesion;
        $this->_dateAdhesion = $dateAdhesion;
    }
    
    public function commentaire() { return $this->_commentaire; }
    
    public function setCommentaire($commentaire)
    {
        $this->_commentaire = $commentaire;
    }
    
}
