<?php
class Mediatheque
{
    private $_cout_adhesion = 0;
    private $_cout_caution = 0;
    private $_duree_adhesion = 0;
    private $_nombre_emprunt_autorisee = 0;
    private $_nombre_ayantdroit_autorisee = 0;
    private $_duree_emprunt = 0;
    private $_duree_retard = 0;
    
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
    
    public function cout_adhesion() { return $this->_cout_adhesion; }
    
    public function setCout_adhesion($coutAdhesion)
    {
        $coutAdhesion = (int)$coutAdhesion;
        
        $this->_cout_adhesion = $coutAdhesion;
    }
    
    public function cout_caution() { return $this->_cout_caution; }
    
    public function setCout_caution($coutCaution)
    {
        $coutCaution = (int)$coutCaution;
        
        $this->_cout_caution = $coutCaution;
    }
    
    public function duree_adhesion() { return $this->_duree_adhesion; }
    
    public function setDuree_adhesion($dureeAdhesion)
    {
        $dureeAdhesion = (int)$dureeAdhesion;
        
        $this->_duree_adhesion = $dureeAdhesion;
    }
    
    public function nombre_emprunt_autorisee() { return $this->_nombre_emprunt_autorisee; }
    
    public function setNombre_emprunt_autorisee($nombreEmpruntAutorise)
    {
        $nombreEmpruntAutorise = (int)$nombreEmpruntAutorise;
        
        $this->_nombre_emprunt_autorisee = $nombreEmpruntAutorise;
    }
    
    public function nombre_ayantdroit_autorisee() { return $this->_nombre_ayantdroit_autorisee; }
    
    public function setNombre_ayantdroit_autorisee($nombreAyantdroitAutorise)
    {
        $nombreAyantdroitAutorise = (int)$nombreAyantdroitAutorise;
        
        $this->_nombre_ayantdroit_autorisee = $nombreAyantdroitAutorise;
    }
    
    public function duree_emprunt() { return $this->_duree_emprunt; }
    
    public function setDuree_emprunt($dureeEmprunt)
    {
        $dureeEmprunt = (int)$dureeEmprunt;
        $this->_duree_emprunt = $dureeEmprunt;
    }
    
    public function duree_retard() { return $this->_duree_retard; }
    
    public function setDuree_retard($dureeRetard)
    {
        $dureeRetard = (int)$dureeRetard;
        
        $this->_duree_retard = $dureeRetard;
    }
    
    function __toString()
    {
        $med = "</br>Je suis la Mediatheque</br>";
        $med .= "cout_adhesion = " .$this->cout_adhesion()."</br>";
        $med .= "cout_caution = " .$this->cout_caution()."</br>";
        $med .= "duree_adhesion = " .$this->duree_adhesion()."</br>";
        $med .= "nombre_emprunt_autorisee = " .$this->nombre_emprunt_autorisee()."</br>";
        $med .= "nombre_ayantdroit_autorisee = " .$this->nombre_ayantdroit_autorisee()."</br>";
        $med .= "duree_emprunt = " .$this->duree_emprunt()."</br>";
        $med .= "duree_retard = " .$this->duree_retard()."</br>";
        
        return $med;
    }
}