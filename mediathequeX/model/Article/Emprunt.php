<?php // Julien
class Emprunt
{
    private $_adherent = NULL;
    private $_article = NULL;
    private $_dateEmprunt = "";
    private $_dateRetourEffectif = "";
    private $_commentaire = "";
    private $_estEnRetard = false;


    
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
    
    public function dateEmprunt() { return $this->_dateEmprunt; }
    
    public function setDateEmprunt($date)
    {
        // Verifier si DateEmprunt est valide (if $date === ???)
        $this->_dateEmprunt = $date;
    }
    
    public function dateRetourEffectif() { return $this->_dateRetourEffectif; }
    
    public function setDateRetourEffectif($date)
    {
        // Verifier si DateEmprunt est valide (if $date === ???)
        $this->_dateRetourEffectif = $date;
    }
    
    public function estEnRetard() { return $this->_estEnRetard; }
    
    public function setEstEnRetard($estEndRetard)
    {
        $estEndRetard = (bool)$estEndRetard;
        
        $this->_estEnRetard = $estEndRetard;
    }

    public function commentaire() { return $this->_commentaire; }
    
    public function setCommentaire($commentaire)
    {
        $this->_commentaire = $commentaire;
    }
    
    
}