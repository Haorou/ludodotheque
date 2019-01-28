<h1 class="form-heading" style="text-align: center">Gérer l'adhérent</h1>
<div class="container">
	<div class="row">
		<div class="col-sm" style="text-align:center">
		<form action="?action=gestionAdherents" method="post">
			
			<div class="p-3 mb-2 bg-primary text-white">Emprunts</div>
			
			<?php 
			$empruntManager = new EmpruntManager();
			$listEmprunts = $empruntManager->readCurrentEmpruntsAdherent($perso);
			$nombreEmprunts = count($listEmprunts);
			if($nombreEmprunts < 2) {?>
			<br>
			<button type="submit" class="btn btn-success" name="PageEmpruntUnArticle">Emprunter un nouvel article</button>
			<?php }
			$tempsActuel = time();
			foreach($listEmprunts as $emprunt )
			{
			?>
            <div class="form-row" style="margin-top :20px">
                <div class="input-group input-group-lg col-md-6 mx-auto">
                    <div class="input-group-prepend">
            			<input type="radio" name="article_rendu" value=<?= $emprunt->article()->id()?> id="emprunt_article_id<?= $emprunt->article()->id()?>" /></input>
                   				<label for="emprunt_article_id<?= $emprunt->article()->id()?>"><?= "{$emprunt->date_emprunt()} <br> 
                                                                        {$emprunt->article()->fiche_article()->titre()}  " ?></label>
       				</div>
       			</div>
       		</div>
       		<?php 
           		$date_emprunt = strtotime($emprunt->date_emprunt());
           		$tempsEntreMaintenantEtEmprunt = $tempsActuel - $date_emprunt;
           		if($tempsEntreMaintenantEtEmprunt > 2678401)
           		{
           		    ?>
           		 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Attention : </strong> plus de 15 jours de retard
                </div>
           		    <?php 
           		}
           		else if($tempsEntreMaintenantEtEmprunt > 1339201)
           		{
    		      ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention : </strong> retard
                    </div>
        			
    		      <?php
           		}
			}
       		
			if($nombreEmprunts > 0) {?>
			<button type="submit" class="btn btn-danger" name="RendreUnArticle" style="margin-top :20px">Rendre un article</button>
			<?php }?>
		
		</div>			
		<div class="col-sm" style="text-align:center">
			<div class="p-3 mb-2 bg-primary text-white">Adhérent</div>
			<div class="p-3 mb-2 bg-light text-dark"> Nom : <?= $perso->nom(); ?> </div>
			<div class="p-3 mb-2 bg-light text-dark"> Prénom : <?= $perso->prenom(); ?> </div>
			<div class="p-3 mb-2 bg-light text-dark">Coordonnées : <?= $perso->adresse()->code_postal(); ?></div>	
			<div class="p-3 mb-2 bg-light text-dark">Nombre d'emprunt : <?= $nombreEmprunts ?></div>
			
			
			<div class="list-group">
  				<button type="button" class="list-group-item list-group-item-action active">Adhésions</button>
  				<?php 
  	  				
  				foreach($perso->date_adhesions() as $date) {?>			
	  				<button type="button" class="list-group-item list-group-item-action"><?= $date; ?></button>
  				<?php }?>	
			</div>
			
			<br>
			<?php
			$tempsAbonnement = strtotime($perso->last_date_adhesion());
			
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
			else if(($tempsActuel - $tempsAbonnement) > (31536000 - 2678400)) // un mois avant la fin
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
		
		
		</form>
			
		<div class="col-sm" style="text-align:center">
			<div class="p-3 mb-2 bg-primary text-white">Ayant droits</div>

		
			
			<form action="?action=gestionAdherents" method="post">


  				<?php 
  				$nombreAyandroit = count($perso->ayant_droits());
  				if($nombreAyandroit < 2){
  				?>
    			<div class="input-group">
        			<select name="civilite" id="inputState" class="form-control">
        				<option selected>monsieur</option>
        				<option>madame</option>
        				<option>autre</option>
        			</select>
      				
        			<input type="text" name="nom" class="form-control" placeholder="Nom" required>
        			<input type="text" name="prenom" class="form-control" placeholder="Prenom" required>
    			</div>
      				<button type="submit" class="btn btn-success" name="creerAyantDroit" style="margin-top :20px">Ajouter Ayant Droit</button>
  				<?php }?>
			
			
			</form>
			
			<form action="?action=gestionAdherents" method="post">
			<?php foreach($perso->ayant_droits() as $ayantdroit) {?>
			
            <div class="form-row">
                <div class="input-group input-group-lg col-md-6 mx-auto">
                    <div class="input-group-prepend">
           				<input type="radio" name="ayantdroit_a_supprimer" value=<?= $ayantdroit->id()?> id="ayantDroit<?= $ayantdroit->id()?>" /></input>
           				<label for="ayantDroit<?= $ayantdroit->id()?>"><?= " {$ayantdroit->nom()} {$ayantdroit->prenom()}  " ?></label>
           			</div>
       			</div>
   			</div>
   			<?php }?>
   			
   			<br>
			<button type="submit" class="btn btn-danger">Supprimer Ayant droit</button>
		
			</form>
		</div>
	</div>
</div>

