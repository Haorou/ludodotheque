<?php //Gaetan
class Adherent extends Personne
{
    private $_adhesion_a_renouveller = false;
    private $_cheque_est_depose = false;
    private $_adresse = NULL;
    private $_date_adhesions = array ();
    private $_commentaire = "";
    private $_ayant_droits = array();
    
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
        return $this->_cheque_est_depose = true;
    }
    function isAdhesionARenouveller() {
        return $this->_adhesion_a_renouveller = true;
    }
    
    //----------------------Getters and Setters------------------------//
  
    public function adhesion_a_renouveller() { return $this->_adhesion_a_renouveller; }
    
    public function setAdhesion_a_renouveller($adhesionARenouveller)
    {
        $adhesionARenouveller = (bool)$adhesionARenouveller;
        
        $this->_adhesion_a_renouveller = $adhesionARenouveller;
    }
    
    public function chaque_est_depose() { return $this->_cheque_est_depose; }
    
    public function setCheque_est_depose($chequeEstDepose)
    {
        $chequeEstDepose = (bool)$chequeEstDepose;
        
        $this->_prenom = $chequeEstDepose;
    }
    
    public function adresse() { return $this->_adresse; }
    
    public function setAdresse(Adresse $adresse)
    {        
        $this->_adresse = $adresse;
    }
    
    public function date_adhesions() { return $this->_dateAdhesion; }
    public function first_date_adhesion() { return $this->_dateAdhesion[0]; }
    public function last_date_adhesion() { return $this->_dateAdhesion[count(_dateAdhesion)-1]; }
    
    public function set_date_adhesions($dateAdhesion)
    {
        $dateAdhesion = (string)$dateAdhesion;
        $this->_dateAdhesion = $dateAdhesion;
    }
    
    public function commentaire() { return $this->_commentaire; }
    
    public function setCommentaire($commentaire)
    {
        $this->_commentaire = $commentaire;
    }
    
    public function ayant_droits() { return $this->_ayant_droits; }
    
    public function setAyant_droits(AyantDroit $ayantDroits)
    {
        $this->_ayant_droits = $ayantDroits;
    }
    
}
