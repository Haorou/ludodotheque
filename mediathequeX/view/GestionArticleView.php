<!DOCTYPE html>
<html>
    <head>
        <title>Mediathèque : Article</title>
 		
 		<?php require("view/require/HeadReferenceView.php");?>
    </head>

    <body>
		<?php require("view/require/HeaderView.php");?>
		
		<?php if(isset($_POST["select"]))
                  require("view/require/GestionArticleSuiteView.php");
              
              else
                  require("view/require/SearchBarView.php");?>
		
		<?php require("view/require/FooterView.php");?>
				
    </body>
</html>