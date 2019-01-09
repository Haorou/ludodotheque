<?php // Marc-Antoine
abstract class FicheArticle
{
   
    private $_id = 0;
    private $_titre = "";
    private $_auteur = "";
    private $_editeur = "";
    private $_age_min = 0;
    private $_age_max = 0;
    private $_date_de_publication = "";
    private $_elements_du_jeu = array();
    
    //--------------------------Constructeur---------------------------//

    
    //----------------------------Methodes-----------------------------//
    
    
    //----------------------Getters and Setters------------------------//

    
    public function id() { return $this->_id; }
    
    public function setId($id)
    {
        $id = (int)$id;
        
        $this->_id = $id;
    }
    
    public function titre() { return $this->_titre; }
        
    public function setTitre($titre)
    {
        $titre = (string)$titre;
        $this->_titre = $titre;
    }

    public function auteur() { return $this->_auteur; }

    public function setAuteur($auteur)
    {
        $auteur = (string)$auteur;
        $this->_auteur = $auteur;
    }

    public function editeur() { return $this->_editeur; }
    
    public function setEditeur($editeur)
    {
        $editeur = (string)$editeur;
        $this->_editeur = $editeur;
    }

    public function age_min() { return $this->_age_min; }
    
    public function setAge_min($ageMin)
    {
        $ageMin = (int)$ageMin;
        $this->_age_min = $ageMin;
    }

    public function age_max() { return $this->_age_max; }

    public function setAge_max($ageMax)
    {
        $ageMax = (int)$ageMax;
        $this->_age_max = $ageMax;
    }

    public function date_de_publication() { return $this->_date_de_publication; }

    public function setDate_de_publication($dateDePublication)
    {
        $dateDePublication = (string)$dateDePublication;
        $this->_date_de_publication = $dateDePublication;
    }
    
    public function elements_du_jeu() { return $this->_elements_du_jeu; }
    
    public function setElements_duJeu(ElementsDuJeu $elementsDuJeu)
    {
        $this->_elements_du_jeu = $elementsDuJeu;
    }
}