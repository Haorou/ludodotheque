<?php
$placeholder = "";

if ($GLOBALS["isActiveAdherent"] == TRUE)
{
    $placeholder = "Rechercher un adherent";
}
elseif($GLOBALS["isActiveJeu"] == TRUE)
{
    $placeholder = "Rechercher un jeu";
}
elseif($GLOBALS["isActiveAlerte"] == TRUE)
{
    $placeholder = "Rechercher un article avec une alerte";
}
?>

	<div class="container" ><br/>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <form class="">
                
                    <div class="card-body row no-gutters align-items-center" >
                        
                        <!--end of col-->
                        <div class="col">
                        	<input class="form-control form-control-lg form-control-borderless" type="search" placeholder="<?=$placeholder ?>">
                        </div>
                        
                        <!--end of col-->
                        <div class="col-auto">
                        	<button class="btn btn-lg btn-success" type="submit">
                        	<span class="glyphicon glyphicon-search"></span>Rechercher</button>
                        </div>
                        <!--end of col-->
                    
                    </div>
                    
                </form>
            </div>
        <!--end of col-->
        </div>
    </div>
    
    <div class="container" style="margin-top: 10px">
        <div class="row"  >
            <div class="col-md-10" > 
            
              		<?php if ($GLOBALS["isActiveAdherent"] == TRUE) { ?>
              		
                  		<form action="?action=gestionAdherents" method="post">
                  		
                  		<select class="custom-select" size="15" name="select">
                  		
                  		<?php 
                  		        $persoManager = new PersonneManager();
                      		    $listeDeAdherent = $persoManager->readAllAdherent();
                      		    foreach($listeDeAdherent as $adherent)
                  		        {
                  		?>
                     
                      <option value=<?= $adherent->id() ?> > 
                      		<?="{$adherent->nom()} {$adherent->prenom()}" ?> 
                      </option>
                      
                      <?php } } else if ($GLOBALS["isActiveJeu"] == TRUE) { ?>
                      
                  		<form action="?action=gestionJeux" method="post">
                  		
                  		<select class="custom-select" size="15" name="select">
              			<?php 
                                $ficheManager = new FicheJeuManager();
                                $jeuManager = new JeuManager();
                                
                                $listeDeFiche = $ficheManager->readAllFicheJeux();
                                $nombreDeJeux = "";
                                
                                foreach($listeDeFiche as $fiche)
                                {
                                    $nombreDeJeux = $jeuManager->readCountJeux($fiche->id());
                       ?>
	                      <option value=<?= $fiche->id() ?>> <?= "$nombreDeJeux jeux - {$fiche->titre()}" ?> </option>
                      
                      
                      <?php }} else if ($GLOBALS["isActiveAlerte"] == TRUE) { ?>
                      
                  		<form action="?action=gestionAlertes" method="post">
                  		
                  		<select class="custom-select" size="15" name="select">
              			<?php 
              			
              			  $jeuManager = new JeuManager();
              			  $arrayJeu = $jeuManager->readAllJeuxAlert();
              			  
              			  foreach($arrayJeu as $jeu)
              			  {
              			      foreach($jeu->alertes() as $alert)
              			      {
              			          ?>
                           	<option value=<?= $alert->id() ?>> <?= $alert->probleme() . " | " . $alert->commentaire().  " | " . "{$alert->adherent()->nom()} {$alert->adherent()->prenom()}" ?> </option>
                           
              			          <?php
              			      }
              			  }

                          $tempsActuel = time();
                          $empruntManager = new EmpruntManager();
                          $listeEmprunts = $empruntManager->readAllCurrentEmprunts();
                          
                          foreach($listeEmprunts as $emprunt)
                          {
                              $date_emprunt = strtotime($emprunt->date_emprunt());
                              $tempsEntreMaintenantEtEmprunt = $tempsActuel - $date_emprunt;
                              if($tempsEntreMaintenantEtEmprunt > 2678401) 
                              { ?>
                           
                           <option value=<?= $emprunt->article()->id() ?>> <?= " retard +15 jours | {$emprunt->article()->fiche_article()->titre()} | {$emprunt->adherent()->nom()} {$emprunt->adherent()->prenom()}" ?> </option>
                           
       		    <?php         } 
                          } 
                      } 
                      ?>
                      
                    </select>

    			<?php if ($GLOBALS["isActiveJeu"] == TRUE) {?>
    			
                <div class="row">                    
                    <div class="col-md-12" style="text-align:center ; margin-top :20px">
            			<button type="submit" class="btn btn-lg btn-success" value="Afficher les Articles" name="AfficherLesArticles">
            			<span class="glyphicon glyphicon-eye-open"></span> Afficher les articles </button>
                    </div>
                </div>
    			
    			<?php }?>
                
            </div>
            
            <div class="col-md-2">
            
            <?php if ($GLOBALS["isActiveAdherent"] == TRUE) { ?>

    			<div>
            		<button type="submit" class="btn btn-lg btn-success" value="Page Creer Adherent" name="PageCreerAdherent">
            		<span class="glyphicon glyphicon-user"></span> Créer adhérent</button>
            	</div>

            	<div>
            		<button type="submit" class="btn btn-lg btn-warning" value="Modifier Adherent" name="ModifierAdherent" style="margin-top :20px">
            		<span class="glyphicon glyphicon-cog"></span> Gérer adhérent</button>
            	</div>
            	<div>
            		<button type="submit" class="btn btn-lg btn-danger" value="Supprimer utilisateur" name="SupprimerUtilisateur" style="margin-top :20px">
            		<span class="glyphicon glyphicon-trash"></span> Supprimer adhérent</button>
            	</div>

			<?php } else if ($GLOBALS["isActiveJeu"] == TRUE) { ?>

    			<div>
            		<button type="submit" class="btn btn-lg btn-success" value="Page Ajouter Fiche" name="PageAjouterFiche">
            		<span class="glyphicon glyphicon-list-alt"></span> Ajouter fiche jeu</button>
            	</div>

            	<div>
            		<button type="submit" class="btn btn-lg btn-warning" value="Modifier utilisateur" name="ModifierFicheJeu" style="margin-top :20px">
            		<span class="glyphicon glyphicon-cog"></span> Modifier fiche jeu</button>
            	</div>
            	<div>
            		<button type="submit" class="btn btn-lg btn-danger" value="Supprimer utilisateur" name="SupprimerFicherJeu" style="margin-top :20px">
            		<span class="glyphicon glyphicon-trash"></span> Supprimer fiche jeu</button>
            	</div>

			<?php } ?>
            </form>
			</div>
        </div>
    </div>