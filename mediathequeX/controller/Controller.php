<?php
    session_start();
    
    function loginPage()
    {
        require("view/ConnexionView.php");
    }
    
    function menuPrincipalPage()
    {
        require("view/MenuPrincipalView.php");
    }
