<?php
function GestionArticlesPage()
{
    require("view/GestionArticleView.php");
}

function PageFormulaireFicheJeu()
{
    $ficheJeuManager = new FicheJeuManager();
    
    $typesJeu = $ficheJeuManager->readTypesJeux();
    $nombreDeTypesJeu = count($typesJeu);
    
    require("view/FormulaireFicheJeu.php");
}


function CreateFicheJeu()
{
    $ficheJeuManager = new FicheJeuManager();
    
    $ficheJeu = new FicheJeu([
        "nombre_de_joueurs_min" => htmlspecialchars($_POST["nbrejoueurmin"]),
        "nombre_de_joueurs_max" => htmlspecialchars($_POST["nbrejoueurmax"]),
        "duree_min_de_jeu" => htmlspecialchars($_POST["dureemin"]),
        "duree_max_de_jeu" => htmlspecialchars($_POST["dureemax"]),
        "titre" => htmlspecialchars($_POST["nomdujeu"]),
        "editeur" => htmlspecialchars($_POST["editeurdujeu"]),
        "age_min" => htmlspecialchars($_POST["agemin"]),
        "age_max" => htmlspecialchars($_POST["agemax"]),
        "date_de_publication" => htmlspecialchars($_POST["date"]),
        "descriptif" => htmlspecialchars($_POST["descriptif"])
    ]);
    
    $ficheJeu->setTypes_de_jeu(htmlspecialchars($_POST["type_jeu_1"]));
    
    if($_POST["type_jeu_1"] != htmlspecialchars($_POST["type_jeu_2"]))
        $ficheJeu->setTypes_de_jeu(htmlspecialchars($_POST["type_jeu_2"]));
        
        $ficheJeuManager->createFicheJeu($ficheJeu);
        
        require("view/GestionArticleView.php");
}

function DeleteFicheJeu()
{
    if(isset($_POST["select"]))
    {
        $ficheJeuManager = new FicheJeuManager();
        $fiche = $ficheJeuManager->readFicheJeu(htmlspecialchars($_POST["select"]));
        $ficheJeuManager->deleteFicheJeu($fiche);
    }
    
    require("view/GestionArticleView.php");
}

function ReadLesArticles()
{
    if(isset($_POST["select"]))
    {
        $_SESSION["id_fiche_article"]  = htmlspecialchars($_POST["select"]);
        
        $jeuManager = new JeuManager();
        $ficheJeuManager = new FicheJeuManager();
        
        $listeJeux = $jeuManager->readSelectJeux(htmlspecialchars($_POST["select"]));
        $nombreDeJeux = count($listeJeux);
        
        $fiche = $ficheJeuManager->readFicheJeu(htmlspecialchars($_POST["select"]));
    }
    require("view/GestionArticleView.php");
}

function CreateArticle()
{
    $jeuManager = new JeuManager();
    $ficheJeuManager = new FicheJeuManager();
    
    $Jeu = new Jeu([
        "prix_achat" => htmlspecialchars($_POST["prix"]),
        "date_ajout" => date_format(new DateTime('now'), 'Y-m-d H:i:s'),
        "commentaire" => htmlspecialchars($_POST["commentaire"])
    ]);
    $Jeu->setFiche_article($ficheJeuManager->readFicheJeu(htmlspecialchars($_SESSION["id_fiche_article"])));
    
    $jeuManager->createJeu($Jeu);
    
    
    $listeJeux = $jeuManager->readSelectJeux(htmlspecialchars($_SESSION["id_fiche_article"]));
    $nombreDeJeux = count($listeJeux);
    
    $fiche = $ficheJeuManager->readFicheJeu(htmlspecialchars($_SESSION["id_fiche_article"]));
    
    require("view/GestionArticleView.php");
}

function ModifierFicheJeu()
{
    if(isset($_POST["select"]))
    {
        $_SESSION["id_fiche_article"]  = htmlspecialchars($_POST["select"]);
        
        $ficheJeuManager = new FicheJeuManager();
        $ficheJeu = $ficheJeuManager->readFicheJeu(htmlspecialchars($_SESSION["id_fiche_article"]));
        
        $typesJeu = $ficheJeuManager->readTypesJeux();
        $nombreDeTypesJeu = count($typesJeu);
        
        require("view/FormulaireFicheJeu.php");
    }
    else
        require("view/GestionArticleView.php");
        
}

function UpdateFicheJeu()
{
    $ficheJeuManager = new FicheJeuManager();
    $ficheJeu = new FicheJeu([
        "nombre_de_joueurs_min" => htmlspecialchars($_POST["nbrejoueurmin"]),
        "nombre_de_joueurs_max" => htmlspecialchars($_POST["nbrejoueurmax"]),
        "duree_min_de_jeu" => htmlspecialchars($_POST["dureemin"]),
        "duree_max_de_jeu" => htmlspecialchars($_POST["dureemax"]),
        "titre" => htmlspecialchars($_POST["nomdujeu"]),
        "editeur" => htmlspecialchars($_POST["editeurdujeu"]),
        "age_min" => htmlspecialchars($_POST["agemin"]),
        "age_max" => htmlspecialchars($_POST["agemax"]),
        "date_de_publication" => htmlspecialchars($_POST["date"]),
        "descriptif" => htmlspecialchars($_POST["descriptif"])
    ]);
    
    
    $ficheJeu->setTypes_de_jeu(htmlspecialchars($_POST["type_jeu_1"]));
    
    if($_POST["type_jeu_1"] != htmlspecialchars($_POST["type_jeu_2"]))
        $ficheJeu->setTypes_de_jeu(htmlspecialchars($_POST["type_jeu_2"]));
        
        $ficheJeu->setId(htmlspecialchars($_SESSION["id_fiche_article"]));
    $ficheJeuManager->updateFicheJeu($ficheJeu);
        
    require("view/GestionArticleView.php");
}

function SupprimerArticle()
{
    if(isset($_POST["select"]))
    {
        $jeuManager = new JeuManager();
        $ficheJeuManager = new FicheJeuManager();
        
        $jeu = $jeuManager->readJeu(htmlspecialchars(["select"]));
        $jeuManager->deleteJeu($jeu);
        
        $listeJeux = $jeuManager->readSelectJeux(htmlspecialchars($_SESSION["id_fiche_article"]));
        $nombreDeJeux = count($listeJeux);
        
        $fiche = $ficheJeuManager->readFicheJeu(htmlspecialchars($_SESSION["id_fiche_article"]));
    }
    
    require("view/GestionArticleView.php");
}
