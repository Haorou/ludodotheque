<?php
$placeholder = "";

if ($GLOBALS["isActiveAdherent"] == TRUE)
{
    $placeholder = "Rechercher un adherent";
}
elseif($GLOBALS["isActiveArticle"] == TRUE)
{
    $placeholder = "Rechercher un article";
}
elseif($GLOBALS["isActiveAlerte"] == TRUE)
{
    $placeholder = "Rechercher un article avec une alerte";
}
?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <div class="container"><br/>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <form class="card card-sm">
                    <div class="card-body row no-gutters align-items-center">
                        
                        <div class="col-auto">
                            <i class="fas fa-search h4 text-body"></i>
                        </div>
                        
                        <!--end of col-->
                        <div class="col">
                        	<input class="form-control form-control-lg form-control-borderless" type="search" placeholder="<?=$placeholder ?>">
                        </div>
                        
                        <!--end of col-->
                        <div class="col-auto">
                        	<button class="btn btn-lg btn-success" type="submit">Search</button>
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
            <div class="col-md-10" > <!-- style="background-color: red"  UTILE A METTRE POUR VOIR LA TAILLE DES CHAMPS -->
            
            <!-- IL FAUT PEUPLER CECI EN FONCTION D'UNE REQUETE INITAL GENERAL "SELECT * FROM ... " -->
	        <!-- PUIS PRECISER LA REQUETE EN FONCTION DES MOTS TAPPER DANS LE CHAMPS DE RECHERCE "SELECT * FROM ... WHERE = "champs de recherche" " -->
	        <!-- POUR ACTUALISER : UTILISATION JAVASCRIPT -->
            <form action="index.php" method="post">
            
        			<select class="custom-select" size="15" name="persoSelect">
                  		<?php 
                  		if ($GLOBALS["isActiveAdherent"] == TRUE) 
                  		    { 
                      		    $persoManager = new PersonneManager();
                      		    $listeDeAdherent = $persoManager->readAllAdherent();
                      		    
                      		    foreach($listeDeAdherent as $adherent)
                  		        {
                  		?>
                     
                      	<option value=<?= $adherent->id() ?>> <?= $adherent->nom() ?> </option>
                      
                      <?php }} else if ($GLOBALS["isActiveArticle"] == TRUE) 
                            { 
                                $ficheManager = new FicheJeuManager();
                                $jeuManager = new JeuManager();
                                
                                $listeDeFiche = $ficheManager->readAllFicheJeux();
                                $jeuManager->readAllCountJeux();
                                
                                foreach($listeDeFiche as $fiche)
                                {
                       ?>
	                      <option value=<?= $fiche->id() ?>> <?= $fiche->titre() ?> </option>
                      
                      
                      <?php }} else if ($GLOBALS["isActiveAlerte"] == TRUE) 
                            { 
                            
                                
                      ?>
                      
                      <?php } ?>
                      
                    </select>

    			
                <div class="row">
                    <div class="col-md-6">.col-md-6</div>
                    <div class="col-md-6">.col-md-6</div>
                </div>
                
            </div>
            
            <div class="col-md-2">
            
            <?php if ($GLOBALS["isActiveAdherent"] == TRUE) { ?>

    			<div>
            		<button type="submit" class="btn btn-lg btn-success" value="Page Creer Adherent" name="PageCreerAdherent">
            		<span class="glyphicon glyphicon-user"></span> Créer Adherent</button>
            	</div>

            	<div>
            		<button type="submit" class="btn btn-lg btn-warning" value="Modifier Adherent" name="ModifierAdherent">
            		<span class="glyphicon glyphicon-cog"></span> Modifier Adherent</button>
            	</div>
            	<div>
            		<button type="submit" class="btn btn-lg btn-danger" value="Supprimer utilisateur" name="SupprimerUtilisateur">
            		<span class="glyphicon glyphicon-trash"></span> Supprimer Adherent</button>
            	</div>
            </form>

			<?php } else if ($GLOBALS["isActiveArticle"] == TRUE) { ?>

    			<div>
            		<button type="submit" class="btn btn-lg btn-success" value="Page Ajouter Fiche" name="PageAjouterFiche">
            		<span class="glyphicon glyphicon-user"></span> Ajouter fiche jeu</button>
            	</div>

            	<div>
            		<button type="submit" class="btn btn-lg btn-primary" value="Modifier utilisateur" name="ModifierUtilisateur">
            		<span class="glyphicon glyphicon-cog"></span> Modifier fiche jeu</button>
            	</div>
            	<div>
            		<button type="submit" class="btn btn-lg btn-danger" value="Supprimer utilisateur" name="SupprimerUtilisateur">
            		<span class="glyphicon glyphicon-trash"></span> Supprimer fiche jeu</button>
            	</div>
            </form>
            
			<?php } else if ($GLOBALS["isActiveAlerte"] == TRUE) { ?>
			
    			<div>
            		<button type="submit" class="btn btn-lg btn-success" value="Page Ajouter Fiche" name="PageAjouterFiche">
            		<span class="glyphicon glyphicon-user"></span> Ajazdzadzar fiche jeu</button>
            	</div>

            	<div>
            		<button type="submit" class="btn btn-lg btn-primary" value="Modifier utilisateur" name="ModifierUtilisateur">
            		<span class="glyphicon glyphicon-cog"></span> Modifier azdzafiche jeu</button>
            	</div>
            	<div>
            		<button type="submit" class="btn btn-lg btn-danger" value="Supprimer utilisateur" name="SupprimerUtilisateur">
            		<span class="glyphicon glyphicon-trash"></span> Supprimazdzaer fiche jeu</button>
            	</div>
            </form>

			<?php } ?>

			</div>
        </div>
    </div>