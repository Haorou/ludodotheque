<?php
abstract class Fiche_article
{
    private $_titre;
    private $_auteur;
    private $_editeur;
    private $_ageMin;
    private $_ageMax;
    private $_date_de_publication;
    
    //-------------------------constructeur----------------------------------
    
    public function __construct(array $donnes)
    {
        $this->hydrate($donnes);
    }
    
    //-----------------------------methode--------------------------------------
    
    
    //-----------------------------getter and setter---------------------------------------------
    
    /**
     * @return mixed
     */
    public function getTitre()
    {
        
        return $this->_titre;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->_auteur;
    }

    /**
     * @return mixed
     */
    public function getEditeur()
    {
        return $this->_editeur;
    }

    /**
     * @return mixed
     */
    public function getAge_min()
    {
        return $this->_ageMin;
    }

    /**
     * @return mixed
     */
    public function getAge_max()
    {
        return $this->_ageMax;
    }

    /**
     * @return mixed
     */
    public function getDate_de_publication()
    {
        return $this->_date_de_publication;
    }

    /**
     * @param mixed $_titre
     */
    public function setTitre($_titre)
    {
        $_titre = (string)$_titre;
        $this->_titre = $_titre;
    }

    /**
     * @param mixed $_auteur
     */
    public function setAuteur($_auteur)
    {
        $_auteur = (string)$_auteur;
        $this->_auteur = $_auteur;
    }

    /**
     * @param mixed $_editeur
     */
    public function setEditeur($_editeur)
    {
        $_editeur = (string)$_editeur;
        $this->_editeur = $_editeur;
    }

    /**
     * @param mixed $_age_min
     */
    public function setAge_min($_age_min)
    {
        $_age_min = (int)$_age_min;
        $this->_ageMin = $_age_min;
    }

    /**
     * @param mixed $_age_max
     */
    public function setAge_max($_age_max)
    {
        $_age_max = (int)$_age_max;
        $this->_ageMax = $_age_max;
    }

    /**
     * @param mixed $_date_de_publication
     */
    public function setDate_de_publication($_date_de_publication)
    {
        $_date_de_publication = (string)$_date_de_publication;
        $this->_date_de_publication = $_date_de_publication;
    }

    
   
    
   
}