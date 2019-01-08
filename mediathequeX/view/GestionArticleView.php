<!DOCTYPE html>
<html>
    <head>
        <title>Mediatheque : Article</title>
        
 		<?php require("view/require/HeadReferenceView.php");?>
    </head>

    <body>
		<?php require("view/require/HeaderView.php");?>
		
	
	<h3><center>Formulaire &agrave; remplir pour ajouter un article &nbsp;<span class="badge badge-secondary"> Nouvel article </span></h3> <!--sous-balise SPAN pour appliquer un style � une partie du texte  -->
	
	
	<form>
	<div class="form-group" style="position:absolute;top:200;left:50px;height:600px;width:400px">
    	<label for="nomdujeu">&nbsp; Nom du jeu </label>
    	<input type="text" class="form-control" id="nomdujeu" placeholder="Saisie obligatoire">
  		<label for="editeurdujeu">&nbsp; Editeur du jeu </label>
    	<input type="text" class="form-control" id="editeurdujeu" placeholder="Saisie obligatoire">
   		<label for="anneedujeu"> Année d'édition </label>
    	<!-- <div class="container"> -->
    		<div class="col-sm-6" style="height:100px; left:0px;">
        		<div class="form-group">
            		<div class='input-group date' id='datetimepicker10'>
                		<input type='text' class="form-control" placeholder="Saisie obligatoire" />
                		<span class="input-group-addon">
                    		<span class="glyphicon glyphicon-calendar">
                    		</span>
                		</span>
            		</div>
        		</div>
    		</div>
    		<script type="text/javascript">
        		$(function () {
            		$('#datetimepicker10').datetimepicker({
                	viewMode: 'years',
                	format: 'MM/YYYY'
           	 	});
        		});
    		</script>
	<!-- 	</div> -->
    	
    	
    	<!-- <select class="form-control" id="annee">
      		<option>2019</option>
      		<option>2018</option>
      		<option>2017</option>
      		<option>2016</option>
      		<option>2015</option>
      		<option>2014</option>
      		<option>2013</option>
      		<option>2012</option>
      		<option>2011</option>
      		<option>2010</option>
      		<option>2009</option>
      		<option>2008</option>
      		<option>2007</option>
      		<option>2006</option>
      		<option>2005</option>
      		<option>2004</option>
      		<option>2003</option>
      		<option>2002</option>
      		<option>2001</option>
      		<option>2000</option>
      		<option>1999</option>
      		<option>1998</option>
      		<option>1997</option>
      		<option>1996</option>
      		<option>1995</option>
      		<option>1994</option>
      		<option>1993</option>
      		<option>1992</option>
      		<option>1991</option>
      		<option>1990</option>
      		<option>1989</option>
      		<option>1988</option>
      		<option>1987</option>
      		<option>1986</option>
      		<option>1985</option>
      		<option>1984</option>
      		<option>1983</option>
      		<option>1982</option>
      		<option>1981</option>
      		<option>1980</option>
      		<option>1979</option>
      		<option>1978</option>
      		<option>1977</option>
      		<option>1976</option>
      		<option>1975</option>
      		<option>Avant 1975</option>
      		</select> -->
  	 
    <label for="commentaires"> Commentaires</label>
    <textarea class="form-control" id="commentaires" rows="5"></textarea>
  	</div>
  	
   
</div>

  	
  	
  	
	<!-- <div class="btn-group" role="group" aria-label="Basic example">
  		<button type="button" class="btn btn-secondary">Afficher les articles</button>
  		<button type="button" class="btn btn-secondary">Ajouter l'article en stock</button>
  		<button type="button" class="btn btn-secondary">Cr�er fiche de jeu</button>
	</div> -->
	</form>	
		<?php require("view/require/FooterView.php");?>
		
    </body>
</html>