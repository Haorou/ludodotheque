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

// SERT A CHARGER DES PAGES EN FONCTION DES OBJET CREER 
spl_autoload_register('chargerClasse');

session_start();

// Variables utilis�es pour activer certaines composantes de la navbar
// Utilisation de $GLOBALS par la suite pour utiliser ces variables qu'on d�finit � chaque fois par FALSE

$isActiveMenu = FALSE;
$isActiveAdherent = FALSE;
$isActiveJeu = FALSE;
$isActiveAlerte = FALSE;

function ConnexionPage()
{
    require("view/ConnexionView.php");
}

if(isset($_GET["action"]) && $_GET["action"] == "menuPrincipal")
    include("./controller/ControllerMenu.php");

else if(isset($_GET["action"]) && $_GET["action"] == "gestionAdherents")
    include("./controller/ControllerAdherent.php");

else if(isset($_GET["action"]) && $_GET["action"] == "gestionJeux")
    include("./controller/ControllerJeu.php");

else if(isset($_GET["action"]) && $_GET["action"] == "gestionAlertes")
    include("./controller/ControllerAlerte.php");