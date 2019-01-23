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




/*
=========================================   CODE QUI PERMET D'AVOIR LA DATE D'AUJOURD'HUI =============================================
echo date_format(new DateTime('now'), 'Y-m-d H:i:s');
*/

/*
 // ================================   CREATION D'UN EMPRUNT + CREATION DANS BASE DE DONNES (TODO base de donn�es ) =====================================

$adherentManager = new PersonneManager();
$jeuManager = new JeuManager();
$empruntManager = new EmpruntManager();

$adherent =  $adherentManager->readAdherent(20);
$jeu = $jeuManager->readJeu(5);

$adherent = new Adherent(["civilite" => "monsieur",
                        "nom" => "Grenec",
                        "prenom" => "JEAN",
                        "date_adhesions" => "2019-01-05",
                        "commentaire" => "a boire"]);

$jeu = new Jeu(["date_ajout" => "2019-01-12",
    "prix_achat" => 40,
    "commentaire" => "Que la guerre commence"]);


$emprunt = new Emprunt(["date_emprunt" => "2019-01-12",
                        "commentaire" => "Un bel emprunt !"]);

$emprunt->setAdherent($adherent);
$emprunt->setArticle($jeu);



//echo $emprunt;
//$empruntManager->createEmprunt($empruntArticle);
$adherentManager = new PersonneManager();
$articleManager = new JeuManager();

$empruntManager = new EmpruntManager();

$monEmprunt = $empruntManager->readCurrentEmpruntsAdherent($adherentManager->readAdherent(15));
echo $monEmprunt[0];

echo "=========================================================";

$newEmprunt = $empruntManager->readAllEmpruntsArticle($articleManager->readJeu(15));
echo $newEmprunt[0];



/*
 // ================================   READ + UPDATE MEDIATHEQUE + CREATION DANS BASE DE DONNES =====================================
$mediathequeManager = new MediathequeManager();
$mediatheque = $mediathequeManager->readParametre();
echo $mediatheque;
*/

/*
 // ================================   CREATION D'UNE FICHEJEU ET ELEMENTS DU JEU + CREATION DANS BASE DE DONNES =====================================

$ficheJeuManager  = new FicheJeuManager();


$ficheJeu = $ficheJeuManager->readFicheJeu(6);
$ficheJeuManager->deleteFicheJeu($ficheJeu);
*/

/*
 // ================================   CREATION D'UN JEU + CREATION DANS BASE DE DONNES =====================================
$ficheJeuManager = new FicheJeuManager();

//$ficheJeuManager->deleteFicheJeu($fiche);

$jeuManager= new JeuManager();

$jeu = new Jeu(["date_ajout" => "2019-01-12",
                "prix_achat" => 40,
                "commentaire" => "Que la guerre commence"]);

$alerte1 = new AlerteJeu(["element_jeu" => "pion",
                            "probleme" => "manquant" ,
                            "couleur" => "blanc",
                            "quantite" => 2,
                            "commentaire" => "a retrouver"]);

$alerte2 = new AlerteJeu(["element_jeu" => "carte",
                        "probleme" => "degradé",
                        "couleur" => "noir",
                        "quantite" => 1,
                        "commentaire" => "pas grave"]);

$jeu->setFiche_article($ficheJeuManager->readFicheJeu(4));
$jeu->setAlertes($alerte1);
$jeu->setAlertes($alerte2);
$jeuManager->createJeu($jeu);
echo "ICI LE JEU CREE ";
echo $jeu;
*/

/*
// ================================   CREATION D'UN ADHERENT ET AYANTDROIT + CREATION DANS BASE DE DONNES =====================================
$persoManager  = new PersonneManager();

$ayantdroit1 = new AyantDroit(["civilite" => "madame",
                                "nom" => "Morto",
                                "prenom" => "Louis"]);

$ayantdroit2 = new AyantDroit(["civilite" => "autre",
                                "nom" => "Bourbi",
                                "prenom" => "Babar"]);

$adherent = new Adherent(["civilite" => "monsieur",
                          "nom" => "Grenec",
                          "prenom" => "JEAN",
                          "date_adhesions" => "2019-01-05",
                          "commentaire" => "a boire"]);


$adresse = new Adresse(["numero" => 26,
                        "nom_voie" => "dazdza",
                        "type_voie" => "allée",
                        "complement" => "c'est proche",
                        "code_postal" => 56000,
                        "ville" => "Vannes",
                         "region" => "Bretagne"]);

$adherent->setAdresse($adresse);
$adherent->setAyant_droits($ayantdroit1);
$adherent->setAyant_droits($ayantdroit2);

//$adherent = $persoManager->readAdherent(20);
//$persoManager->deleteAdherent($adherent);
//$persoManager->createAdherent($adherent);
*/

// Variables utilis�es pour activer certaines composantes de la navbar
// Utilisation de $GLOBALS par la suite pour utiliser ces variables qu'on d�finit � chaque fois par FALSE

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
    
    if(isset($_POST["select"]))
    {
        $PersonManager = new PersonneManager();
        $perso = $PersonManager->readAdherent($_POST["select"]);

        $_SESSION["id_adherent"]  = $_POST["select"];
        
        require("view/AffichageAdherentView.php");
    }
    else
        require("view/GestionAdherentView.php");
}

////////////////////////////////////////////////////////////////////////////

function CreateAdherent()
{
    $PersonManager = new PersonneManager();
    
    $perso = new Adherent([
        "civilite" => $_POST["civilite"],
        "nom" => $_POST["nom"],
        "prenom" => $_POST["prenom"]
    ]);
    
    $adresse = new Adresse([
        "numero" => $_POST["numero"],
        "type_voie" => $_POST["type_voie"],
        "nom_voie" => $_POST["nom_voie"],
        "code_postal" => $_POST["code_postal"],
        "ville" => $_POST["ville"],
        ]);
    
    $adresse->setRegion($PersonManager->readRegion($adresse->code_postal()));
    
    $perso->setDate_adhesions(date_format(new DateTime('now'), 'Y-m-d H:i:s'));
    
    $perso->setAdresse($adresse);
    
    $PersonManager->createAdherent($perso);
    
    $GLOBALS["isActiveAdherent"] = TRUE;
    require("view/AffichageAdherentView.php");
}

function DeleteAdherent()
{
    $GLOBALS["isActiveAdherent"] = TRUE;
    
    if(isset($_POST["select"]))
    {
        $personneManager = new PersonneManager();
        $perso = $personneManager->readAdherent($_POST["select"]);
        $personneManager->deleteAdherent($perso);
    }

    require("view/GestionAdherentView.php");
}

function CreateAyantDroit()
{
    $personneManager = new PersonneManager();
    
    $ayantdroit = new AyantDroit([
        "civilite" => $_POST["civilite"],
        "nom" => $_POST["nom"],
        "prenom"=> $_POST["prenom"]
    ]);

    $personneManager->createAyantDroit($ayantdroit, $personneManager->readAdherent($_SESSION["id_adherent"]));
    
    $perso = $personneManager->readAdherent($_SESSION["id_adherent"]);
    
    $GLOBALS["isActiveAdherent"] = TRUE;
    require("view/AffichageAdherentView.php");
}

function DeleteAyandroit()
{
    $personneManager = new PersonneManager();
    
    $ayantdroit = $personneManager->readAyantDroitById($_POST["ayantdroit_a_supprimer"]);

    $personneManager->deleteAyantDroit($ayantdroit);
     
    $perso = $personneManager->readAdherent($_SESSION["id_adherent"]);
    
    $GLOBALS["isActiveAdherent"] = TRUE;
    require("view/AffichageAdherentView.php");

}

function RenouvellerAdhesion()
{
    $personneManager = new PersonneManager();
    
    $perso = $personneManager->readAdherent($_SESSION["id_adherent"]);
    $perso->setDate_adhesions(date_format(new DateTime('now'), 'Y-m-d H:i:s'));
    $personneManager->addAdhesion($perso);
    
    $GLOBALS["isActiveAdherent"] = TRUE;
    require("view/AffichageAdherentView.php");
}

function CreateFicheJeu()
{
    $ficheJeuManager = new FicheJeuManager();
    
    $ficheJeu = new FicheJeu([
        "nombre_de_joueurs_min" => $_POST["nbrejoueurmin"],
        "nombre_de_joueurs_max" => $_POST["nbrejoueurmax"],
        "duree_min_de_jeu" => $_POST["dureemin"],
        "duree_max_de_jeu" => $_POST["dureemax"],
        "titre" =>$_POST["nomdujeu"],
        "editeur" => $_POST["editeurdujeu"],
        "age_min" => $_POST["agemin"],
        "age_max" => $_POST["agemax"],
        "date_de_publication" => $_POST["date"],
        "descriptif" => $_POST["descriptif"]
    ]);
    
    $ficheJeu->setTypes_de_jeu($_POST["type_jeu_1"]);

    if($_POST["type_jeu_1"] != $_POST["type_jeu_2"])
        $ficheJeu->setTypes_de_jeu($_POST["type_jeu_2"]);
    
    $ficheJeuManager->createFicheJeu($ficheJeu);
    
    $GLOBALS["isActiveArticle"] = TRUE;
    require("view/GestionArticleView.php");
}

function DeleteFicheJeu()
{
    $GLOBALS["isActiveArticle"] = TRUE;
    
    if(isset($_POST["select"]))
    {
        $ficheJeuManager = new FicheJeuManager();
        $ficheJeu = $ficheJeuManager->readFicheJeu($_POST["select"]);
        $ficheJeuManager->deleteFicheJeu($ficheJeu);
    }
    
    require("view/GestionArticleView.php");
}

function ReadLesArticles()
{
    $GLOBALS["isActiveArticle"] = TRUE;
    $_SESSION["id_fiche_article"]  = $_POST["select"];
    
    if(isset($_POST["select"]))
    {
        $jeuManager = new JeuManager();
        $ficheJeuManager = new FicheJeuManager();
        
        $listeJeux = $jeuManager->readSelectJeux($_POST["select"]);
        
        $fiche = $ficheJeuManager->readFicheJeu($_POST["select"]);
    }

    require("view/GestionArticleView.php");

}
function CreateArticle()
{
    $GLOBALS["isActiveArticle"] = TRUE;
    
    $jeuManager = new JeuManager();
    $ficheJeuManager = new FicheJeuManager();
    
    $Jeu = new Jeu([
        "prix_achat" => $_POST["prix"],
        "date_ajout" => date_format(new DateTime('now'), 'Y-m-d H:i:s'),
        "commentaire" => $_POST["commentaire"]]);
    $Jeu->setFiche_article($ficheJeuManager->readFicheJeu($_SESSION["id_fiche_article"]));
    
    $jeuManager->createJeu($Jeu);
    
    require("view/GestionArticleView.php");
}

function ModifierFicheJeu()
{
    $GLOBALS["isActiveArticle"] = TRUE;
    if(isset($_POST["select"]))
    {
        $_SESSION["id_fiche_article"]  = $_POST["select"];
        
        $ficheJeuManager = new FicheJeuManager();
        $ficheJeu = $ficheJeuManager->readFicheJeu($_SESSION["id_fiche_article"]);
        
        require("view/FormulaireFicheJeu.php");
    }
    else
        require("view/GestionArticleView.php");

}
    
function UpdateFicheJeu()
{
    $GLOBALS["isActiveArticle"] = TRUE;

    $ficheJeuManager = new FicheJeuManager();
    $ficheJeu = new FicheJeu([
        "nombre_de_joueurs_min" => $_POST["nbrejoueurmin"],
        "nombre_de_joueurs_max" => $_POST["nbrejoueurmax"],
        "duree_min_de_jeu" => $_POST["dureemin"],
        "duree_max_de_jeu" => $_POST["dureemax"],
        "titre" =>$_POST["nomdujeu"],
        "editeur" => $_POST["editeurdujeu"],
        "age_min" => $_POST["agemin"],
        "age_max" => $_POST["agemax"],
        "date_de_publication" => $_POST["date"],
        "descriptif" => $_POST["descriptif"]
    ]);
    
    $ficheJeu->setTypes_de_jeu($_POST["type_jeu_1"]);
    
    if($_POST["type_jeu_1"] != $_POST["type_jeu_2"])
        $ficheJeu->setTypes_de_jeu($_POST["type_jeu_2"]);
    
    $ficheJeu->setId($_SESSION["id_fiche_article"]);
    $ficheJeuManager->updateFicheJeu($ficheJeu);
    
    require("view/GestionArticleView.php");
}



