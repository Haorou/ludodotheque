    <div class="container" style="margin-top: 10px">
        <div class="row"  >
            <div class="col-md-10" > <!-- style="background-color: red"  UTILE A METTRE POUR VOIR LA TAILLE DES CHAMPS -->
            
                <!-- IL FAUT PEUPLER CECI EN FONCTION D'UNE REQUETE INITAL GENERAL "SELECT * FROM ... " -->
    	        <!-- PUIS PRECISER LA REQUETE EN FONCTION DES MOTS TAPPER DANS LE CHAMPS DE RECHERCE "SELECT * FROM ... WHERE = "champs de recherche" " -->
    	        <!-- POUR ACTUALISER : UTILISATION JAVASCRIPT -->
                <form action="?action=gestionAdherents" method="post">
                
        			<select class="custom-select" size="15" name="select">
                  		
                  		<?php  for($index = 0 ; $index < $nombreDeJeux ; $index++) {  ?>
                  		
	                      <option value=<?= $listeJeux[$index]->id() ?> > <?= "ID : {$listeJeux[$index]->id()} - {$listeJeux[$index]->date_ajout()} | {$listeJeux[$index]->prix_achat()}€" ?> </option>
        				
        				<?php } ?>
                      
                    </select>
            </div>
            
            
            <div class="col-md-2">
            	<div>
            		<button type="submit" class="btn btn-lg btn-success" value="Emprunter Article" name="EmprunterArticle" style="margin-top :20px">
            		<span class="glyphicon glyphicon-trash"></span> Emprunter Article</button>
            	</div>
            </form>
            

			</div>
        </div>
    </div>