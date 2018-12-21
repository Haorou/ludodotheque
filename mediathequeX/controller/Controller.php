<?php
    session_start();
    
    function ConnexionPage()
    {
        require("view/ConnexionView.php");
    }
    
    function MenuPrincipalPage()
    {
        require("view/MenuPrincipalView.php");
    }

    function GestionAlertePage()
    {
        require("view/GestionAlerteView.php");
    }
    
    function GestionArticlesPage()
    {
        require("view/GestionArticleView.php");
    }
    
    function GestionAdherentsPage()
    {
        require("view/GestionAdherentView.php");
    }