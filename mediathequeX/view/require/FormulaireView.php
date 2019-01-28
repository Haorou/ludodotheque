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
                        
                        	<div class="form-row" style="margin-top :20px">
                        		<div class="form-group col-md-2">
                        			<select name="civilite" id="inputState" class="form-control">
                        				<option selected>monsieur</option>
                        				<option>madame</option>
                        				<option>autre</option>
                        			</select>
                        		</div>
                        	
                        	
                        		<div class="form-group col-md-3">
                        			<input name="nom" type="text" class="form-control" placeholder="Nom" required>
                        		</div>
                        		
                        		<div class="form-group col-md-3">
                        			<input name="prenom" type="text" class="form-control" placeholder="Prénom" required>
                        		</div>
                        	</div>
                        
                        
                        	<div class="form-row " style="margin-top :20px">
                        		<div class="form-group col-md-1">
                        			<input name="numero" type="text" class="form-control" placeholder="N°" required>
                        		</div>
                        
                        		<div class="form-group col-md-2">
                        			<select name="type_voie" id="inputState" class="form-control">
                        				<option selected>Rue</option>
                        				<option>Allée</option>
                        				<option>Avenue</option>
                        				<option>Boulevard</option>
                        				<option>Impasse</option>
                        				<option>Lieu-dit</option>
                        			</select>
                        		</div>
                        
                        		<div class="form-group col-md-3">
                        			<input name="nom_voie" type="text" class="form-control" placeholder="Nom de la voie" required>
                        		</div>
                        	</div>
                        
                        	<div class="form-row " style="margin-top :20px">
                        		<div class="form-group col-md-2">
                        			<input name="code_postal" type="text" class="form-control" placeholder="Code Postal" required>
                        		</div>
                        
                        		<div class="form-group col-md-3">
                        			<input name="ville" type="text" class="form-control" placeholder="Ville" required>
                        		</div>
                        	</div>
                        
                        	<button type="submit" class="btn btn-success" value="Creer Adherent" name="CreerAdherent" style="margin-top :20px">Créer Adhérent</button>								
                        </form>
					</div>
				</div>
			</div>
		</div>
		
	<div class="col-md-2"></div>
	</div>
</div>		
