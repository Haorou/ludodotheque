<?php
function chargerClasse($classname)
{
    if($classname == "EmpruntManager" || $classname == "FicheJeuManager" || 
    $classname == "JeuManager" || $classname == "MediathequeManager" ||
    $classname == "PersonneManager" ||$classname == "ManagerPDO" )
    {
        require('model/PDO/'.$classname.'.php');
    }
    else if($classname == "AlerteJeu" || $classname == "Article" ||
    $classname == "Emprunt" || $classname == "Jeu")
    {
        require('model/Article/'.$classname.'.php');
    }
    else if($classname == "ElementsDuJeu" || $classname == "FicheArticle" ||
    $classname == "FicheJeu")
    {
        require('model/Fiche/'.$classname.'.php');
    }
    else if($classname == "Mediatheque" || $classname == "Utilisateur")
    {
        require('model/Mediatheque/'.$classname.'.php');
    }
    else
    {
        require('model/Personne/'.$classname.'.php');
    }
}

// SERT A CHARGER DES PAGES EN FONCTION DES OBJET CREER - VOIR SI SA FONCTION
spl_autoload_register('chargerClasse');

session_start();

/*
 // ================================   CREATION D'UNE FICHEJEU ET ELEMENTS DU JEU + CREATION DANS BASE DE DONNES =====================================

A FAIIIIIIIIIIIIIIIIIIIRE
*/

/*
// ================================   CREATION D'UN ADHERENT ET AYANTDROIT + CREATION DANS BASE DE DONNES =====================================
$ayantdroit1 = new AyantDroit(["civilite" => "madame",
                                "nom" => "Morto",
                                "prenom" => "Louis"]);

$ayantdroit2 = new AyantDroit(["civilite" => "autre",
                                "nom" => "Bourbi",
                                "prenom" => "Babar"]);

$persoManager  = new PersonneManager();

$adherent = new Adherent(["civilite" => "monsieur",
                       "nom" => "Grenec",
                       "prenom" => "JEAN",
                       "commentaire" => "a boire"]);


$adresse = new Adresse(["numero" => 26,
                        "nom_voie" => "dazdza",
                        "type_voie" => "allÃ©e",
                        "complement" => "c'est proche",
                        "code_postal" => 56000,
                        "ville" => "Vannes",
                         "region" => "Bretagne"]);

$dates_adhesion= "2019-04-09";
$adherent->setAdresse($adresse);
$adherent->setDate_adhesions($dates_adhesion);
$adherent->setAyant_droits($ayantdroit1);
$adherent->setAyant_droits($ayantdroit2);

echo $adherent;
//$persoManager->createAdherent($adherent);
*/

// Variables utilisées pour activer certaines composantes de la navbar
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

function PageFormulaireAdhesion()
{
    $GLOBALS["isActiveAdherent"] = TRUE;
    require("view/FormulaireAdhesion.php");
}

function PageFormulaireFicheJeu()
{
    $GLOBALS["isActiveArticle"] = TRUE;
    require("view/FormulaireFicheJeu.php");
}
function PageModifierAdherent()
{
    $GLOBALS["isActiveAdherent"] = TRUE;
    require("view/AffichageAdherentView.php");
}

