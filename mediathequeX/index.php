<?php

// ON CHARGE LE CONTROLLER DANS L'INDEX

//include("./controller/controller.php");
include("./controller/Controller.php");

// PAGE INDEX OU ON REVIENT CONTINUELLEMENT ON SE DEPLACE EN FONCTION DES $_POST[]
// SI AUCUN $_POST[] ON ARRIVE A LA PAGE CONNEXION

try
{
    if((isset($_POST["connexion"])) || isset($_POST["menuPrincipal"]))
    {
        MenuPrincipalPage();
    }
    else if(isset($_POST["gestionAlerte"]))
    {
        GestionAlertePage();
    }
    else if(isset($_POST["gestionArticles"]))
    {
        GestionArticlesPage();
    }
    else if(isset($_POST["PageAjouterFiche"]))
    {
        PageFormulaireFicheJeu();
    }
    else if(isset($_POST["gestionAdherents"]))
    {
        GestionAdherentsPage();
    }
    else if(isset($_POST["PageCreerAdherent"]))
    {
        PageFormulaireAdhesion();
    }
    else if(isset($_POST["ModifierAdherent"]))
    {
        PageModifierAdherent();
    }
    else if(isset($_POST["CreerAdherent"]) )
    {
        CreateAdherent();
    }
    else if(isset($_POST["SupprimerUtilisateur"]))
    {
        DeleteAdherent();
    }
    else if(isset($_POST["creerAyantDroit"]))
    {
        CreateAyantDroit();
    }
    else if(isset($_POST["ayantdroit_a_supprimer"]))
    {
        DeleteAyandroit();
    }
    else if(isset($_POST["renouveller_adhesion"]))
    {
        RenouvellerAdhesion();
    }
    else if(isset($_POST["ajouterFicheJeu"]))
    {
        CreateFicheJeu();
    }
    else if(isset($_POST["SupprimerFicherJeu"]))
    {
        DeleteFicheJeu();
    }
    else
    {
        ConnexionPage();
        // require("view/AffichageAdherentView.php");
    }
}
catch(Exception $e)
{
    die($e->getMessage());
}
?>