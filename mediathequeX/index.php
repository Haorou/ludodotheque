<?php

// ON CHARGE LE CONTROLLER DANS L'INDEX

require("controller/controller.php");

// PAGE INDEX OU ON REVIENT CONTINUELLEMENT ON SE DEPLACE EN FONCTION DES $_POST[]
// SI AUCUN $_POST[] ON ARRIVE A LA PAGE CONNEXION

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
    else if(isset($_POST["PageCreerUtilisateur"]) && $_POST["PageCreerUtilisateur"] === "Page Creer Utilisateur")
    {
        PageFormulaireAdhesion();
    }
    else
    {
        ConnexionPage();
        //   require("view/AffichageAdherentView.php");
    }

}
catch(Exception $e)
{
    die($e->getMessage());
}