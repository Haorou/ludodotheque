<?php

require("controller/controller.php");

try
{
    if((isset($_POST["connexion"]) && $_POST["connexion"] === "connexion") ||
       (isset($_POST["menuPrincipal"]) && $_POST["menuPrincipal"] === "Menu Principal"))
    {
        MenuPrincipalPage();
    }
    else if(isset($_POST["gestionAlerte"]) && $_POST["gestionAlerte"] === "Gestion Alerte")
    {
        GestionAlertePage();
    }
    else if(isset($_POST["gestionArticles"]) && $_POST["gestionArticles"] === "Gestion Articles")
    {
        GestionArticlesPage();
    }
    else if(isset($_POST["gestionAdherents"]) && $_POST["gestionAdherents"] === "Gestion Adherents")
    {
        GestionAdherentsPage();
    }
    else
    {
        ConnexionPage();
    }

}
catch(Exception $e)
{
    die($e->getMessage());
}