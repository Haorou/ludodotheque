<div class="container">
	<div class="row">
		<div class="col-sm">
			<div class="list-group">
  				<button type="button" class="list-group-item list-group-item-action active">Adhésions</button>
  				
  				<?php foreach($perso->date_adhesions() as $date) {?>			
	  				<button type="button" class="list-group-item list-group-item-action"><?= $date; ?></button>
  				<?php }?>	
			</div>
			
			<br>
			<button type="button" class="btn btn-success" style="text-align: bottom">Renouveller Adhésion</button>
			
		</div>			
		<div class="col-sm">
			<div class="p-3 mb-2 bg-primary text-white">Adhérent</div>
			<div class="p-3 mb-2 bg-light text-dark"> Nom : <?= $perso->nom(); ?> </div>
			<div class="p-3 mb-2 bg-light text-dark"> Prénom : <?= $perso->prenom(); ?> </div>
			<div class="p-3 mb-2 bg-light text-dark">Coordonnées : <?= $perso->adresse()->code_postal(); ?></div>			
			<div class="p-3 mb-2 bg-light text-dark">Nombre d'emprunt : </div>
			<br>
			<button type="button" class="btn btn-success">Emprunter un nouvel article</button>
			
			<br>
			<button type="button" class="btn btn-danger">Rendre Un Article</button>
			
		</div>
		<div class="col-sm">
			<div class="p-3 mb-2 bg-primary text-white">Nouveau Ayant droit</div>
			<div class="input-group">
  				<div class="input-group-prepend">
    				<span class="input-group-text">Nom et Prénom</span>
  				</div>
  				
    			<input type="text" aria-label="First name" class="form-control">
    			<input type="text" aria-label="Last name" class="form-control">
  				
  				<br>
  				<button type="button" class="btn btn-success">Ajouter Ayant Droit</button>
			</div>
			<br>
			<p>

       				Veuillez indiquer l'ayant droit à supprimer :<br />

       				<input type="checkbox" name="ayantDroit" value="ayantDroit1" id="ayantDroit1" /> <label for="ayantDroit1">ayantDroit1</label><br />

       				<input type="checkbox" name="ayantDroit" value="ayantDroit2" id="ayantDroit2" /> <label for="ayantDroit2">ayantDroit2</label><br />

   			</p>
   			
   			<br>
			<button type="button" class="btn btn-danger">Supprimer Ayant droit</button>
		
			
		</div>
	</div>
</div>

