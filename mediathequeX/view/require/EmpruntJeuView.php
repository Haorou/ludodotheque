<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <div class="container"><br/>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <form class="">
                    <div class="card-body row no-gutters align-items-center">
 
                        <!--end of col-->
                        <div class="col">
                        	<input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Chercher un jeu">
                        </div>
                        
                        <!--end of col-->
                        <div class="col-auto">
                        	<button class="btn btn-lg btn-success" type="submit">Rechercher</button>
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
            <form action="?action=gestionAdherents" method="post">
            
        			<select class="custom-select" size="15" name="select">
        			<?php 
                           $ficheManager = new FicheJeuManager();
                                $jeuManager = new JeuManager();
                                
                                $listeDeFiche = $ficheManager->readAllFicheJeux();
                                $nombreDeJeux = "";
                                
                                foreach($listeDeFiche as $fiche)
                                {
                                    $nombreDeJeux = $jeuManager->readCountJeuxNonEmprunte($fiche->id());
                       ?>
	                      <option value=<?= $fiche->id() ?>> <?php echo "$nombreDeJeux jeux - {$fiche->titre()}" ?> </option>
                           		
                      <?php } ?>
                    </select>

                
            </div>
            
            <div class="col-md-2">

    			<div>
            		<button type="submit" class="btn btn-lg btn-success" value="Voir Articles Emprunts" name="VoirArticlesEmprunts">
            		<span class="glyphicon glyphicon-user"></span> Voir articles</button>
            	</div>
            </form>

			</div>
        </div>
    </div>