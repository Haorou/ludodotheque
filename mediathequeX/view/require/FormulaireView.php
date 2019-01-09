<!DOCTYPE html>
<div class="container" style="margin-top: 10px">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" style="text-align: center">
			<div>
				<h1 class="form-heading">Formulaire d'adhesion</h1>
				<div>
					<div>
						<form action="index.php?action=creerUtilisateur" method="post">


							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio"
									name="inlineRadioOptions" id="inlineRadio1" value="option1"> 
									<label class="form-check-label" for="inlineRadio1">Mme</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio"
									name="inlineRadioOptions" id="inlineRadio2" value="option2"> 
									<label class="form-check-label" for="inlineRadio2">Mr</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio"
									name="inlineRadioOptions" id="inlineRadio3" value="option3">
								<label class="form-check-label" for="inlineRadio3">Autre</label>
							</div>


							<div class="form-row">
								<div class="form-group col-md-3">
									<label>Nom</label> <input type="text" class="form-control"
										placeholder="Nom">
								</div>
								<div class="form-group col-md-3">
									<label>Prenom</label> <input type="text" class="form-control"
										placeholder="Prenom">
								</div>
							</div>


							<div class="form-row">
								<div class="form-group col-md-1">
									<label>Numero</label> <input type="text" class="form-control"
										placeholder="Numero">
								</div>

								<div class="form-group col-md-2">
									<label for="inputState">Voie</label> <select id="inputState"
										class="form-control">
										<option selected>Choisir</option>
										<option>Rue</option>
										<option>Allee</option>
										<option>Avenue</option>
										<option>Boulevard</option>
										<option>Impasse</option>
										<option>Lieu-dit</option>
									</select>
								</div>

								<div class="form-group col-md-3">
									<label>Nom de la voie</label> <input type="text"
										class="form-control" placeholder="Nom de la voie">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-2">
									<label>Code Postal</label> <input type="text"
										class="form-control" placeholder="Code Postal">
								</div>

								<div class="form-group col-md-3">
									<label>Ville</label> <input type="text" class="form-control"
										placeholder="Ville">
								</div>
							</div>

							<form method="post">
								<button type="submit" class="btn btn-success" value="Creer Utilisateur" name="Creer Utilisateur">Creer Utilisateur</button>
							</form>

						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>		
