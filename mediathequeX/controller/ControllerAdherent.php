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
        
        $PersonManager->closeConnexion();
        
        require("view/AffichageAdherentView.php");
    }
    else
        require("view/GestionAdherentView.php");
    
        
}

function CreateAdherent()
{
    $PersonManager = new PersonneManager();
    
    $perso = new Adherent();
    $perso->setCivilite(htmlspecialchars($_POST["civilite"]));
    $perso->setNom(htmlspecialchars($_POST["nom"]));
    $perso->setPrenom(htmlspecialchars($_POST["prenom"]));
    
    $adresse = new Adresse();
    $adresse->setNumero(htmlspecialchars($_POST["numero"]));
    $adresse->setType_voie(htmlspecialchars($_POST["type_voie"]));
    $adresse->setNom_voie(htmlspecialchars($_POST["nom_voie"]));
    $adresse->setCode_postal(htmlspecialchars($_POST["code_postal"]));
    $adresse->setVille(htmlspecialchars($_POST["ville"]));

    $adresse->setRegion($PersonManager->readRegion($adresse->code_postal()));
    
    $perso->setDate_adhesions(date_format(new DateTime('now'), 'Y-m-d H:i:s'));
    
    $perso->setAdresse($adresse);
    
    $PersonManager->createAdherent($perso);

    $_SESSION["id_adherent"]  = $perso->id();
    
    $PersonManager->closeConnexion();
    
    require("view/AffichageAdherentView.php");
}


function DeleteAdherent()
{
    if(isset($_POST["select"]))
    {
        $personneManager = new PersonneManager();
        $perso = $personneManager->readAdherent(htmlspecialchars($_POST["select"]));
        $personneManager->deleteAdherent($perso);
        
        $personneManager->closeConnexion();
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
    
    $personneManager->closeConnexion();
    
    require("view/AffichageAdherentView.php");
}

function DeleteAyandroit()
{
    $personneManager = new PersonneManager();
    
    $ayantdroit = $personneManager->readAyantDroitById(htmlspecialchars($_POST["ayantdroit_a_supprimer"]));
    
    $personneManager->deleteAyantDroit($ayantdroit);
    
    $perso = $personneManager->readAdherent(htmlspecialchars($_SESSION["id_adherent"]));
    
    $personneManager->closeConnexion();
    
    require("view/AffichageAdherentView.php");
}

function RenouvellerAdhesion()
{
    $personneManager = new PersonneManager();
    
    $perso = $personneManager->readAdherent(htmlspecialchars($_SESSION["id_adherent"]));
    $perso->setDate_adhesions(date_format(new DateTime('now'), 'Y-m-d H:i:s'));
    $personneManager->addAdhesion($perso);
    
    $personneManager->closeConnexion();
    
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
        
        $ficheJeuManager->closeConnexion();
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
        
        $jeuManager->closeConnexion();
        $adherentManager->closeConnexion();
        $empruntManager->closeConnexion();
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

        $tempsActuel = time();
        $date_emprunt = strtotime($emprunt->date_emprunt());
        $tempsEntreMaintenantEtEmprunt = $tempsActuel - $date_emprunt;
        
        if($tempsEntreMaintenantEtEmprunt > 2678401)
        {
           $alert = new AlerteJeu(
           [   "adherent" => $perso,
               "commentaire" => "En retard",
               "date" => $emprunt->date_emprunt(),
           ]);

           $jeu->setAlertes($alert);
           $jeuManager->updateJeu($jeu);
        }
        
        if(isset($_POST["manquant"]))
        {
            $alert = new AlerteJeu(
                [   "adherent" => $perso,
                    "commentaire" => htmlspecialchars($_POST["commentaire"]),
                    "date" => $emprunt->date_emprunt(),
                    "probleme" => "manquant"
                ]);
                $jeu->setAlertes($alert);
                $jeuManager->updateJeu($jeu);
        }
        
        if(isset($_POST["degrade"]))
        {
            $alert = new AlerteJeu(
                [   "adherent" => $perso,
                    "commentaire" => htmlspecialchars($_POST["commentaire"]),
                    "date" => $emprunt->date_emprunt(),
                    "probleme" => "degradé"
                ]);
                
                $jeu->setAlertes($alert);
                $jeuManager->updateJeu($jeu);
        }
   
        $empruntManager->updateEmprunt($emprunt);
      
        $jeuManager->closeConnexion();
        $adherentManager->closeConnexion();
        $empruntManager->closeConnexion();
    }
    
    require("view/AffichageAdherentView.php");
}


