<?php
    session_start();

    // Variables utilisés pour activer certaines composantes de la navbar
    // Utilisatur de $GLOBALS par la suite pour utiliser les variables déclaré Globales en Locales
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