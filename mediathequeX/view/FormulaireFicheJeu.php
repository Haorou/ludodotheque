<!DOCTYPE html>
<html>
    <head>
        <title>Mediathèque : Article</title>
        
 		<?php require("view/require/HeadReferenceView.php");?>
    </head>

    <body>
		<?php require("view/require/HeaderView.php");?>

		<?php if(isset($_POST["ModifierFicheJeu"]))
		    require("view/require/FormulaireFicheJeuModifierView.php");
		    
        	else if(isset($_POST["PageAjouterFiche"]))
        	    require("view/require/FormulaireFicheJeuView.php"); ?>
		
		<?php require("view/require/FooterView.php");?>
		
    </body>
</html>