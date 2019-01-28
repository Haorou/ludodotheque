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
        
        require("view/GestionArticleView.php");
}

function DeleteFicheJeu()
{
    if(isset($_POST["select"]))
    {
        $ficheJeuManager = new FicheJeuManager();
        $fiche = $ficheJeuManager->readFicheJeu($_POST["select"]);
        $ficheJeuManager->deleteFicheJeu($fiche);
    }
    
    require("view/GestionArticleView.php");
}

function ReadLesArticles()
{
    if(isset($_POST["select"]))
    {
        $_SESSION["id_fiche_article"]  = $_POST["select"];
        
        $jeuManager = new JeuManager();
        $ficheJeuManager = new FicheJeuManager();
        
        $listeJeux = $jeuManager->readSelectJeux($_POST["select"]);
        $nombreDeJeux = count($listeJeux);
        
        $fiche = $ficheJeuManager->readFicheJeu($_POST["select"]);
    }
    require("view/GestionArticleView.php");
}

function CreateArticle()
{
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
    if(isset($_POST["select"]))
    {
        $_SESSION["id_fiche_article"]  = $_POST["select"];
        
        $ficheJeuManager = new FicheJeuManager();
        $ficheJeu = $ficheJeuManager->readFicheJeu($_SESSION["id_fiche_article"]);
        
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
        "nombre_de_joueurs_min" => $_POST["nbrejoueurmin"],
        "nombre_de_joueurs_max" => $_POST["nbrejoueurmax"],
        "duree_min_de_jeu" => $_POST["dureemin"],
        "duree_max_de_jeu" => $_POST["dureemax"],
        "titre" => $_POST["nomdujeu"],
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
