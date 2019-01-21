<!DOCTYPE html>
<html>
    <head>
        <title>Mediathèque : Article</title>
        
 		<?php require("view/require/HeadReferenceView.php");?>
    </head>

    <body>
		<?php require("view/require/HeaderView.php");?>
	
	<div class="container" style="margin-top: 10px">
	 <div class="row">  <!--Pour afficher les colonnes col-md-6  -->
    	<div class="col-md-6"> 
    	
    	
    	
    	
    	
    	</div>
	
    	<div class="col-md-6" style="text-align: center">
        	<div> 
    		<form>
        	   	<label for="nomdujeu"> Nom du jeu </label>
            	<input type="text" class="form-control" id="nomdujeu" placeholder="Saisie obligatoire" value="" required/>
          		<label for="editeurdujeu"> Editeur du jeu </label>
            	<input type="text" class="form-control" id="editeurdujeu" placeholder="Saisie obligatoire" />
           		<label for="anneedujeu"> Année d'édition </label>
            	<input type="date" class="form-control" id="date" placeholder="Saisie obligatoire" value="" required/>
            	<label for="nbrejoueurmin"> Joueurs min </label>
            	<input type="text" class="form-control" id="nbrejoueurmin" />
            	<label for="nbrejoueurmax"> Joueurs max </label>
            	<input type="text" class="form-control" id="nbrejoueurmax" />
            	<label for="agemin"> Age min </label>
            	<input type="text" class="form-control" id="agemin" />
            	<label for="agemax"> Age max </label>
            	<input type="text" class="form-control" id="agemax" />
            	<label for="commentaires"> Commentaires</label>
            	<textarea class="form-control" id="commentaires" rows="3"></textarea>
            	<br>
            	<a href="#" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Ajouter article en stock</a>
            </form>	
    	</div>
	</div></div></div>
		
		<?php require("view/require/FooterView.php");?>
		
    </body>
</html>