<?php
class Mediatheque
{
    private $_coutAdhesion = 0;
    private $_coutCaution = 0;
    private $_dureeAdhesion = 0;
    private $_nombreEmpruntAutorise = 0;
    private $_nombreAyantdroitAutorise = 0;
    private $_dureeEmprunt = 0;
    private $_dureeRetard = 0;
    
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
    
    public function coutAdhesion() { return $this->_coutAdhesion; }
    
    public function setCountAdhesion($coutAdhesion)
    {
        $coutAdhesion = (int)$coutAdhesion;
        
        $this->_coutAdhesion = $coutAdhesion;
    }
    
    public function coutCaution() { return $this->_coutCaution; }
    
    public function setCoutCaution($coutCaution)
    {
        $coutCaution = (int)$coutCaution;
        
        $this->_coutCaution = $coutCaution;
    }
    
    public function dureeAdhesion() { return $this->_dureeAdhesion; }
    
    public function setDureeAdhesion($dureeAdhesion)
    {
        $dureeAdhesion = (int)$dureeAdhesion;
        
        $this->_dureeAdhesion = $dureeAdhesion;
    }
    
    public function nombreEmpruntAutorise() { return $this->_nombreEmpruntAutorise; }
    
    public function setNombreEmpruntAutorise($nombreEmpruntAutorise)
    {
        $nombreEmpruntAutorise = (int)$nombreEmpruntAutorise;
        
        $this->_nombreEmpruntAutorise = $nombreEmpruntAutorise;
    }
    
    public function nombreAyantdroitAutorise() { return $this->_nombreAyantdroitAutorise; }
    
    public function setNombreAyantdroitAutorise($nombreAyantdroitAutorise)
    {
        $nombreAyantdroitAutorise = (int)$nombreAyantdroitAutorise;
        
        $this->_nombreAyantdroitAutorise = $nombreAyantdroitAutorise;
    }
    
    public function dureeEmprunt() { return $this->_dureeEmprunt; }
    
    public function setDureeEmprunt($dureeEmprunt)
    {
        $dureeEmprunt = (int)$dureeEmprunt;
        $this->_dureeEmprunt = $dureeEmprunt;
    }
    
    public function dureeRetard() { return $this->_dureeRetard; }
    
    public function setDureeRetard($dureeRetard)
    {
        $dureeRetard = (int)$dureeRetard;
        
        $this->_dureeRetard = $dureeRetard;
    }
}