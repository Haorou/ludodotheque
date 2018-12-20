<?php

require("controller/controller.php");

try
{
    if(isset($_POST["connexion"]) && $_POST["connexion"] === "connexion")
    {
        menuPrincipalPage();
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