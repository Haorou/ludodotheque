<!DOCTYPE html>
<div class="container" style="margin-top: 10px">
	<div class="row">
		<div class="col-md-2"></div>
		
		<div class="col-md-8" style="text-align: center">
			<div>
				<h1 class="form-heading">Formulaire d'adhésion</h1>
				<div>
					<div>
                        <form action="index.php?action=creerUtilisateur" method="post">
                        
                        	<div class="form-check form-check-inline">
                        		<input class="form-check-input" type="radio" name="civilite" id="inlineRadio1" value="madame"> 
                        		<label class="form-check-label" for="inlineRadio1">Mme</label>
                        	</div>
                        	
                        	<div class="form-check form-check-inline">
                        		<input class="form-check-input" type="radio" name="civilite" id="inlineRadio2" value="monsieur"> 
                        		<label class="form-check-label" for="inlineRadio2">M.</label>
                        	</div>
                        	
                        	<div class="form-check form-check-inline">
                        		<input class="form-check-input" type="radio" name="civilite" id="inlineRadio3" value="autre">
                        		<label class="form-check-label" for="inlineRadio3">Autre</label>
                        	</div>
                        
                        
                        	<div class="form-row justify-content-center">
                        		<div class="form-group col-md-3">
                        			<input name="nom" type="text" class="form-control" placeholder="Nom">
                        		</div>
                        		
                        		<div class="form-group col-md-3">
                        			<input name="prenom" type="text" class="form-control" placeholder="Prénom">
                        		</div>
                        	</div>
                        
                        
                        	<div class="form-row justify-content-center">
                        		<div class="form-group col-md-1">
                        			<input name="numero" type="text" class="form-control" placeholder="N°">
                        		</div>
                        
                        		<div class="form-group col-md-2">
                        			<select name="type_voie" id="inputState"
                        				class="form-control">
                        				<option selected>Voie</option>
                        				<option>Rue</option>
                        				<option>Allée</option>
                        				<option>Avenue</option>
                        				<option>Boulevard</option>
                        				<option>Impasse</option>
                        				<option>Lieu-dit</option>
                        			</select>
                        		</div>
                        
                        		<div class="form-group col-md-3">
                        			<input name="nom_voie" type="text" class="form-control" placeholder="Nom de la voie">
                        		</div>
                        	</div>
                        
                        	<div class="form-row justify-content-center">
                        		<div class="form-group col-md-2">
                        			<input name="code_postal" type="text" class="form-control" placeholder="Code Postal">
                        		</div>
                        
                        		<div class="form-group col-md-3">
                        			<input name="ville" type="text" class="form-control" placeholder="Ville">
                        		</div>
                        	</div>
                        
                        	<button type="submit" class="btn btn-success" value="Creer Adherent" name="CreerAdherent">Créer Adhérent</button>								
                        </form>
					</div>
				</div>
			</div>
		</div>
		
	<div class="col-md-2"></div>
	</div>
</div>		
