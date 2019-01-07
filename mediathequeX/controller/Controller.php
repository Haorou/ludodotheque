<?php
    function chargerClasse($classname)
    {
        // Voir si c'est possible d'écrire autant de require qui vont renvoyer dans le vide
        require('model/PDO/'.$classname.'.php');
        require('model/Article/'.$classname.'.php');
        require('model/Fiche/'.$classname.'.php');
        require('model/Mediatheque/'.$classname.'.php');
        require('model/Personne/'.$classname.'.php');
    }
    
    // SERT A CHARGER DES PAGES EN FONCTION DES OBJET CREER - VOIR SI SA FONCTION
    spl_autoload_register('chargerClasse');

    session_start();

    // Variables utilisés pour activer certaines composantes de la navbar
    // Utilisation de $GLOBALS par la suite pour utiliser ces variables qu'on définit à chaque fois par FALSE
    $isActiveMenu = FALSE;
    $isActiveAdherent = FALSE;
    $isActiveArticle = FALSE;
    $isActiveAlerte = FALSE;
    
    function ConnexionPage()
    {
        require("view/ConnexionView.php");
    }
    
    function MenuPrincipalPage()
    {
        $GLOBALS["isActiveMenu"] = TRUE;
        require("view/MenuPrincipalView.php");
    }

    function GestionAlertePage()
    {
        $GLOBALS["isActiveAlerte"] = TRUE;
        require("view/GestionAlerteView.php");
    }
    
    function GestionArticlesPage()
    {
        $GLOBALS["isActiveArticle"] = TRUE;
        require("view/GestionArticleView.php");
    }
    
    function GestionAdherentsPage()
    {
        $GLOBALS["isActiveAdherent"] = TRUE;
        require("view/GestionAdherentView.php");
    }