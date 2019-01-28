    <div class="container" style="margin-top: 10px">
        <div class="row"  >
            <div class="col-md-10" > <!-- style="background-color: red"  UTILE A METTRE POUR VOIR LA TAILLE DES CHAMPS -->
            
                <!-- IL FAUT PEUPLER CECI EN FONCTION D'UNE REQUETE INITAL GENERAL "SELECT * FROM ... " -->
    	        <!-- PUIS PRECISER LA REQUETE EN FONCTION DES MOTS TAPPER DANS LE CHAMPS DE RECHERCE "SELECT * FROM ... WHERE = "champs de recherche" " -->
    	        <!-- POUR ACTUALISER : UTILISATION JAVASCRIPT -->
                <form action="?action=gestionJeux" method="post">
                
        			<select class="custom-select" size="15" name="select">
                  		
                  		<?php  for($index = 0 ; $index < $nombreDeJeux ; $index++) {  ?>
                  		
	                      <option value=<?= $listeJeux[$index]->id() ?> > <?= "ID : {$listeJeux[$index]->id()} - {$listeJeux[$index]->date_ajout()} | {$listeJeux[$index]->prix_achat()}€" ?> </option>
        				
        				<?php } ?>
                      
                    </select>
    
                     <div class="row">    
                       <div class="col-md-3" style="text-align:center ; margin-top :20px"> 
                        		<strong> <?= $fiche->titre(); ?> </strong>
                        </div> 
                          <div class="col-md-3" style="text-align:center ; margin-top :20px"> 
                        	<input name="prix" type="text" class="form-control" placeholder="Prix" required>
                        </div> 
                          <div class="col-md-3" style="text-align:center ; margin-top :20px"> 
                        		<input name="commentaire" type="text" class="form-control" placeholder="Commentaire">
                        </div>                  
                        <div class="col-md-3" style="text-align:center ; margin-top :20px"> 
                        		<button type="submit" class="btn btn-lg btn-success" value="Ajouter Article" name="AjouterArticle">
                		<span class="glyphicon glyphicon-list-alt"></span> Ajouter Article</button>
                        </div> 
        			</div> 
   				</form>
            </div>
            
            
            <div class="col-md-2">
         
            <form action="?action=gestionJeux" method="post">
            	<div>
            		<button type="submit" class="btn btn-lg btn-warning" value="Afficher Article" name="AfficherArticle" style="margin-top :20px">
            		<span class="glyphicon glyphicon-cog"></span> Afficher Article</button>
            	</div>
            	<div>
            		<button type="submit" class="btn btn-lg btn-danger" value="Supprimer Article" name="SupprimerArticle" style="margin-top :20px">
            		<span class="glyphicon glyphicon-trash"></span> Supprimer Article</button>
            	</div>
            </form>
            

			</div>
        </div>
    </div>