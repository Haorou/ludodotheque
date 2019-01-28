<?php

include("./controller/Controller.php");

try
{
    if(isset($_GET["action"]) && $_GET["action"] == "menuPrincipal")
    {
        $GLOBALS["isActiveMenu"] = TRUE;
        
        if((isset($_POST["connexion"])) || isset($_POST["menuPrincipal"]))
            MenuPrincipalPage();
        
    }
    
    else if(isset($_GET["action"]) && $_GET["action"] == "gestionAlertes")
    {
        $GLOBALS["isActiveAlerte"] = TRUE;
        
        if(isset($_POST["gestionAlertes"]))
            GestionAlertePage();
        
    }
    
    else if(isset($_GET["action"]) && $_GET["action"] == "gestionAdherents")
    {
        $GLOBALS["isActiveAdherent"] = TRUE;
        
        if(isset($_POST["gestionAdherents"]))
            GestionAdherentsPage();
        
            
        else if(isset($_POST["PageCreerAdherent"]))
            PageFormulaireAdhesion();
        
            
        else if(isset($_POST["ModifierAdherent"]))
            PageModifierAdherent();
        
            
        else if(isset($_POST["SupprimerUtilisateur"]))
            DeleteAdherent();
        
            
        else if(isset($_POST["CreerAdherent"]) )
            CreateAdherent();
        
            
        else if(isset($_POST["creerAyantDroit"]))
            CreateAyantDroit();
            
            
        else if(isset($_POST["ayantdroit_a_supprimer"]))
            DeleteAyandroit();

            
        else if(isset($_POST["renouveller_adhesion"]))
            RenouvellerAdhesion();

            
        else if(isset($_POST["PageEmpruntUnArticle"]))
            PageEmprunterUnArticle();

            
        else if(isset($_POST["VoirArticlesEmprunts"]))
            VoirArticlesEmprunts();

            
        else if(isset($_POST["EmprunterArticle"]))
            EmprunterArticle();

            
        else if(isset($_POST["RendreUnArticle"]))
            RendreUnArticle();
    }
    
    else if(isset($_GET["action"]) && $_GET["action"] == "gestionJeux")   
    {
        $GLOBALS["isActiveJeu"] = TRUE;
        
        if(isset($_POST["gestionJeux"]))
            GestionArticlesPage();
            
        else if(isset($_POST["ajouterFicheJeu"]))
            CreateFicheJeu();
        
        else if(isset($_POST["PageAjouterFiche"]))
            PageFormulaireFicheJeu();
            
        else if(isset($_POST["ModifierFicheJeu"]))
            ModifierFicheJeu();
            
            
        else if(isset($_POST["SupprimerFicherJeu"]))
            DeleteFicheJeu();

            
        else if(isset($_POST["AfficherLesArticles"]))
            ReadLesArticles();
        

        else if(isset($_POST["AjouterArticle"]))
            CreateArticle();

            
        else if(isset($_POST["UpdateFicheJeu"]))
            UpdateFicheJeu();
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

?>