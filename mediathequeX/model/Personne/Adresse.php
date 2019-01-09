<?php
class Adresse
{
    private $_id = 0;
    private $_numero = 0;
    private $_nom_voie = "";
    private $_type_voie = "";
    private $_complement = "";
    private $_code_postal = 0;
    private $_ville = "";
    private $_region = "";
    
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
    
    public function numero() { return $this->_numero; }
    
    public function setNumero($numero)
    {
        $numero = (int)$numero;
        
        $this->_numero = $numero;
    }
    
    public function nom_voie() { return $this->_nom_voie; }
    
    public function setNom_voie($nom_voie)
    {   
        $this->_nom_voie = $nom_voie;
    }
    
    public function type_voie() { return $this->_type_voie; }
    
    public function setType_voie($type_voie)
    {        
        $this->_type_voie = $type_voie;
    }
    
    public function complement() { return $this->_complement; }
    
    public function setComplement($complement)
    {        
        $this->_complement = $complement;
    }
    
    public function code_postal() { return $this->_code_postal; }
    
    public function setCode_postal($code_postal)
    {        
        $this->_code_postal = $code_postal;
    }
    
    public function ville() { return $this->_ville; }
    
    public function setVille($ville)
    {
        $this->_ville = $ville;
    }
    
    public function region() { return $this->_region; }
    
    public function setRegion($region)
    {   
        $this->_region = $region;
    }
}