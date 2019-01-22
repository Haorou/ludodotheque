<?php // Julien
class Emprunt
{
    private $_adherent = NULL;
    private $_article = NULL;
    private $_date_emprunt = "";
    private $_date_retour_effectif = "";
    private $_commentaire = "";
    private $_est_en_retard = false;
    
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
    
    public function setArticle(Article $article)
    {
        $this->_article = $article;
    }
    
    public function date_emprunt() { return $this->_date_emprunt; }
    
    public function setDate_emprunt($date)
    {
        // Verifier si DateEmprunt est valide (if $date === ???)
        $this->_date_emprunt = $date;
    }
    
    public function date_retour_effectif() { return $this->_date_retour_effectif; }
    
    public function setDate_retour_effectif($date)
    {
        // Verifier si DateEmprunt est valide (if $date === ???)
        $this->_date_retour_effectif = $date;
    }
    
    public function est_en_retard() { return $this->_est_en_retard; }
    
    public function setEst_en_retard($estEndRetard)
    {
        $estEndRetard = (bool)$estEndRetard;
        
        $this->_est_en_retard = $estEndRetard;
    }

    public function commentaire() { return $this->_commentaire; }
    
    public function setCommentaire($commentaire)
    {
        $this->_commentaire = $commentaire;
    }
    
    function __toString()
    {
        $emp = "</br>Je suis un Emprunt</br>";
        $emp .= "date_emprunt = ".$this->date_emprunt()."</br>";
        $emp .= "commentaire = ".$this->commentaire()."</br>";
        $emp .= "est_en_retard = ".$this->est_en_retard()."<br>";
        
        $emp .= $this->adherent();
        
        $emp .= $this->article();
        

        return $emp;
    }
}