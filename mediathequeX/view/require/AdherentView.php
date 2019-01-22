<h1 class="form-heading" style="text-align: center">Gérer l'adhérent</h1>
<div class="container">
	<div class="row">
		<div class="col-sm">
		<form action="index.php" method="post">
			<div class="list-group">
  				<button type="button" class="list-group-item list-group-item-action active">Adhésions</button>
  				<?php 
  				$_SESSION["id_adherent"]  = $perso->id();
  				
  				foreach($perso->date_adhesions() as $date) {?>			
	  				<button type="button" class="list-group-item list-group-item-action"><?= $date; ?></button>
  				<?php }?>	
			</div>
			
			<br>
			<?php
			$tempsAbonnement = strtotime($perso->last_date_adhesion());
			$tempsActuel = time();
			
			if(($tempsActuel - $tempsAbonnement) > 31536000) // une année
			{     
			?>
			<button type="submit" class="btn btn-success" name="renouveller_adhesion" style="text-align: bottom">Renouveller Adhésion</button>
            
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Attention : </strong> l'abonnement doit être renouvellé.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
			
			<?php 
			} 
			else if(($tempsActuel - $tempsAbonnement) > (31536000 - 2678400)) // une année
			{
			?>
			
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Attention : </strong> l'abonnement prend bientôt fin.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
			
			<?php }?>
		
		</div>			
		<div class="col-sm">
			<div class="p-3 mb-2 bg-primary text-white">Adhérent</div>
			<div class="p-3 mb-2 bg-light text-dark"> Nom : <?= $perso->nom(); ?> </div>
			<div class="p-3 mb-2 bg-light text-dark"> Prénom : <?= $perso->prenom(); ?> </div>
			<div class="p-3 mb-2 bg-light text-dark">Coordonnées : <?= $perso->adresse()->code_postal(); ?></div>	
			<?php 
			     $empruntManager = new EmpruntManager();
			     $listEmprunts = $empruntManager->readCurrentEmpruntsAdherent($perso);
			?>		
			<div class="p-3 mb-2 bg-light text-dark">Nombre d'emprunt : <?= count($listEmprunts) ?></div>
			<br>
			<button type="button" class="btn btn-success">Emprunter un nouvel article</button>
			
			<br>
			<button type="button" class="btn btn-danger">Rendre Un Article</button>
			
		</div>
		<div class="col-sm">
			<div class="p-3 mb-2 bg-primary text-white">Nouveau Ayant droit</div>

			</form>
			
			<form action="index.php" method="post">
			<div class="input-group">

  				<?php 
  				$nombreAyandroit = count($perso->ayant_droits());
  				if($nombreAyandroit < 2){
  				?>
  				
    			<select name="civilite" id="inputState" class="form-control">
    				<option selected>monsieur</option>
    				<option>madame</option>
    				<option>autre</option>
    			</select>
  				
    			<input type="text" name="nom" class="form-control" placeholder="Nom" required>
    			<input type="text" name="prenom" class="form-control" placeholder="Prenom" required>
  				
  				<br>

  				<button type="submit" class="btn btn-success" name="creerAyantDroit">Ajouter Ayant Droit</button>
  				<?php }?>
			
			</div>
			</form>
			
			<form action="index.php" method="post">
			<br>
			<p>
			<?php foreach($perso->ayant_droits() as $ayantdroit) {?>
       				<input type="radio" name="ayantdroit_a_supprimer" value=<?= $ayantdroit->id()?> id="ayantDroit1" /> 
       				<label for="ayantDroit1"><?= "{$ayantdroit->nom()} {$ayantdroit->prenom()}  " ?></label><br />
   			<?php }?>
   			</p>
   			
   			<br>
			<button type="submit" class="btn btn-danger">Supprimer Ayant droit</button>
		
			</form>
		</div>
	</div>
</div>

