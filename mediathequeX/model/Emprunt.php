<?php // Julien
class Emprunt
{
    private $_dateEmprunt = "";
    private $_estEnRetard = false;
    private $_adherent = NULL;
    private $_article = NULL;
    
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
    
    public function dateEmprunt() { return $this->_dateEmprunt; }
    
    public function setDateEmprunt($date)
    {
        // Verifier si DateEmprunt est valide (if $date === ???)
        $this->_dateEmprunt = $date;
    }
    
    public function estEnRetard() { return $this->_estEnRetard; }
    
    public function setEstEnRetard($estEndRetard)
    {
        $estEndRetard = (bool)$estEndRetard;
        
        $this->_estEnRetard = $estEndRetard;
    }

    public function adherent() { return $this->_adherent; }
    
    public function setAdherent(Adherent $adherent)
    {
        $this->_adherent = $adherent;
    }

    public function article() { return $this->_article; }
    
    public function setAdherent(Article $article)
    {
        $this->_article = $article;
    }

    
}