<?php 
function TentativeConnexion()
{
    $utilisateur = new Utilisateur(
    [
        "pseudo" => htmlspecialchars($_POST["nomUtilisateur"]),
        "mot_de_passe" => htmlspecialchars($_POST["motDePasse"])
    ]);
    
    $mediathequeManager = new MediathequeManager();
    
    if($mediathequeManager->connexion($utilisateur))
    {
        if($utilisateur->privilege() === 0)
        {
            $_SESSION["utilisateur"] = $utilisateur;
            require("view/MenuPrincipalView.php");
        }
        else
        {
            $_SESSION["utilisateur"] = $utilisateur;
            ConnexionPage(); // Manque la partie administration
        }
    }
    else
    {
        ConnexionPage();
    }
}