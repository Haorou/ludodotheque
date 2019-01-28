<!DOCTYPE html>
<html>
    <head>
        <title>Mediathèque : Adhérent</title>
 	
 		<?php require("view/require/HeadReferenceView.php");?>
    </head>

    <body>
		<?php require("view/require/HeaderView.php");
		
           		if(isset($_POST["PageEmpruntUnArticle"]))
           		{
           		    require("view/require/EmpruntJeuView.php");
           		}
           		else if(isset($_POST["VoirArticlesEmprunts"]) && isset($_POST["select"]))
           		{
           		    require("view/require/EmpruntArticleView.php");
           		}
           		else
           		{
           		    require("view/require/SearchBarView.php");
           		}
		
			   require("view/require/FooterView.php");?>
		
    </body>
</html>