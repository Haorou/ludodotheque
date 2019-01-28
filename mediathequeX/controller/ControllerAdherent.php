<?php
function GestionAdherentsPage()
{
    require("view/GestionAdherentView.php");
}

function PageFormulaireAdhesion()
{
    require("view/FormulaireAdhesion.php");
}

function PageModifierAdherent()
{
    if(isset($_POST["select"]))
    {
        $PersonManager = new PersonneManager();
        $perso = $PersonManager->readAdherent($_POST["select"]);
        
        $_SESSION["id_adherent"]  = htmlspecialchars($_POST["select"]);
        
        require("view/AffichageAdherentView.php");
    }
    else
        require("view/GestionAdherentView.php");
}

function CreateAdherent()
{
    $PersonManager = new PersonneManager();
    
    $perso = new Adherent([
        "civilite" => htmlspecialchars($_POST["civilite"]),
        "nom" => htmlspecialchars($_POST["nom"]),
        "prenom" => htmlspecialchars($_POST["prenom"])
    ]);
    
    $adresse = new Adresse([
        "numero" => htmlspecialchars($_POST["numero"]),
        "type_voie" => htmlspecialchars($_POST["type_voie"]),
        "nom_voie" => htmlspecialchars($_POST["nom_voie"]),
        "code_postal" => htmlspecialchars($_POST["code_postal"]),
        "ville" => htmlspecialchars($_POST["ville"])
    ]);
    
    $adresse->setRegion($PersonManager->readRegion($adresse->code_postal()));
    
    $perso->setDate_adhesions(date_format(new DateTime('now'), 'Y-m-d H:i:s'));
    
    $perso->setAdresse($adresse);
    
    $PersonManager->createAdherent($perso);

    $_SESSION["id_adherent"]  = $perso->id();
    
    require("view/AffichageAdherentView.php");
}


function DeleteAdherent()
{
    if(isset($_POST["select"]))
    {
        $personneManager = new PersonneManager();
        $perso = $personneManager->readAdherent(htmlspecialchars($_POST["select"]));
        $personneManager->deleteAdherent($perso);
    }
    
    require("view/GestionAdherentView.php");
}

function CreateAyantDroit()
{
    $personneManager = new PersonneManager();
    
    $ayantdroit = new AyantDroit([
        "civilite" => htmlspecialchars($_POST["civilite"]),
        "nom" => htmlspecialchars($_POST["nom"]),
        "prenom"=> htmlspecialchars($_POST["prenom"])
    ]);
    
    $personneManager->createAyantDroit($ayantdroit, $personneManager->readAdherent(htmlspecialchars($_SESSION["id_adherent"])));
    
    $perso = $personneManager->readAdherent(htmlspecialchars($_SESSION["id_adherent"]));
    
    require("view/AffichageAdherentView.php");
}

function DeleteAyandroit()
{
    $personneManager = new PersonneManager();
    
    $ayantdroit = $personneManager->readAyantDroitById(htmlspecialchars($_POST["ayantdroit_a_supprimer"]));
    
    $personneManager->deleteAyantDroit($ayantdroit);
    
    $perso = $personneManager->readAdherent(htmlspecialchars($_SESSION["id_adherent"]));
    
    require("view/AffichageAdherentView.php");
}

function RenouvellerAdhesion()
{
    $personneManager = new PersonneManager();
    
    $perso = $personneManager->readAdherent(htmlspecialchars($_SESSION["id_adherent"]));
    $perso->setDate_adhesions(date_format(new DateTime('now'), 'Y-m-d H:i:s'));
    $personneManager->addAdhesion($perso);
    
    require("view/AffichageAdherentView.php");
}

function PageEmprunterUnArticle()
{
    require("view/GestionAdherentView.php");
}

function VoirArticlesEmprunts()
{
    if(isset($_POST["select"]))
    {
        $_SESSION["id_fiche_article"]  = htmlspecialchars($_POST["select"]);
        
        $jeuManager = new JeuManager();
        $ficheJeuManager = new FicheJeuManager();
        
        $listeJeux = $jeuManager->readSelectJeuxNonEmprunte(htmlspecialchars($_POST["select"]));
        $nombreDeJeux = count($listeJeux);
        
        $fiche = $ficheJeuManager->readFicheJeu(htmlspecialchars($_POST["select"]));
    }
    require("view/GestionAdherentView.php");
}

function EmprunterArticle()
{
    if(isset($_POST["select"]))
    {
        $jeuManager = new JeuManager();
        $adherentManager = new PersonneManager();
        $empruntManager = new EmpruntManager();
        $emprunt = new Emprunt([
            "date_emprunt" => date_format(new DateTime('now'), 'Y-m-d H:i:s')
        ]);
        
        $perso = $adherentManager->readAdherent(htmlspecialchars ($_SESSION["id_adherent"]));
        $article = $jeuManager->readJeu(htmlspecialchars ($_POST["select"]));
        
        $emprunt->setAdherent($perso);
        $emprunt->setArticle($article);
        
        $empruntManager->createEmprunt($emprunt);
    }
    require("view/AffichageAdherentView.php");
}

function RendreUnArticle()
{
    if(isset($_POST["article_rendu"]))
    {
        $jeuManager = new JeuManager();
        $adherentManager = new PersonneManager();
        $empruntManager = new EmpruntManager();
        
        $jeu = $jeuManager->readJeu(htmlspecialchars($_POST["article_rendu"]));
        $perso =  $adherentManager->readAdherent(htmlspecialchars($_SESSION["id_adherent"]));
        
        $emprunt = $empruntManager->readCurrentEmpruntsAdherentAndArticle($perso, $jeu);
        
        $emprunt->setDate_retour_effectif(date_format(new DateTime('now'), 'Y-m-d H:i:s'));
        $empruntManager->updateEmprunt($emprunt);
    }
    
    require("view/AffichageAdherentView.php");
}
