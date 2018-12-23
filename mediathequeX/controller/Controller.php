<?php
    session_start();

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