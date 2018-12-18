<?php // Marc-Antoine
abstract class FicheArticle
{
    private $_titre;
    private $_auteur;
    private $_editeur;
    private $_ageMin;
    private $_ageMax;
    private $_dateDePublication;
    
    //--------------------------Constructeur---------------------------//
    
    public function __construct(array $donnes)
    {
        $this->hydrate($donnes);
    }
    
    //----------------------------Methodes-----------------------------//
    
    
    //----------------------Getters and Setters------------------------//

    public function titre()
    {
        
        return $this->_titre;
    }
        
    public function setTitre($titre)
    {
        $titre = (string)$titre;
        $this->_titre = $titre;
    }

    public function auteur()
    {
        return $this->_auteur;
    }

    public function setAuteur($auteur)
    {
        $auteur = (string)$auteur;
        $this->_auteur = $auteur;
    }

    public function editeur()
    {
        return $this->_editeur;
    }
    
    public function setEditeur($editeur)
    {
        $editeur = (string)$editeur;
        $this->_editeur = $editeur;
    }

    public function ageMin()
    {
        return $this->_ageMin;
    }
    
    public function setAgeMin($ageMin)
    {
        $ageMin = (int)$ageMin;
        $this->_ageMin = $ageMin;
    }

    public function ageMax()
    {
        return $this->_ageMax;
    }

    public function setAgeMax($ageMax)
    {
        $ageMax = (int)$ageMax;
        $this->_ageMax = $ageMax;
    }

    public function dateDePublication()
    {
        return $this->_dateDePublication;
    }

    public function setDateDePublication($dateDePublication)
    {
        $dateDePublication = (string)$dateDePublication;
        $this->_dateDePublication = $dateDePublication;
    }

    
   
    
   
}