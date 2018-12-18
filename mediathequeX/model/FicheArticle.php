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
    /**
     * @return mixed
     */
    public function titre()
    {
        
        return $this->_titre;
    }

    /**
     * @return mixed
     */
    public function auteur()
    {
        return $this->_auteur;
    }

    /**
     * @return mixed
     */
    public function editeur()
    {
        return $this->_editeur;
    }

    /**
     * @return mixed
     */
    public function ageMin()
    {
        return $this->_ageMin;
    }

    /**
     * @return mixed
     */
    public function ageMax()
    {
        return $this->_ageMax;
    }

    /**
     * @return mixed
     */
    public function dateDePublication()
    {
        return $this->_dateDePublication;
    }

    /**
     * @param mixed $_titre
     */
    public function setTitre($titre)
    {
        $titre = (string)$titre;
        $this->_titre = $titre;
    }

    /**
     * @param mixed $_auteur
     */
    public function setAuteur($auteur)
    {
        $auteur = (string)$auteur;
        $this->_auteur = $auteur;
    }

    /**
     * @param mixed $_editeur
     */
    public function setEditeur($editeur)
    {
        $editeur = (string)$editeur;
        $this->_editeur = $editeur;
    }

    /**
     * @param mixed $_age_min
     */
    public function setAgeMin($ageMin)
    {
        $ageMin = (int)$ageMin;
        $this->_ageMin = $ageMin;
    }

    /**
     * @param mixed $_age_max
     */
    public function setAgeMax($ageMax)
    {
        $ageMax = (int)$ageMax;
        $this->_ageMax = $ageMax;
    }

    /**
     * @param mixed $_date_de_publication
     */
    public function setDateDePublication($dateDePublication)
    {
        $dateDePublication = (string)$dateDePublication;
        $this->_dateDePublication = $dateDePublication;
    }

    
   
    
   
}