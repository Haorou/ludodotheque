		<h1 class="form-heading" style="text-align: center">Ajouter une fiche jeu</h1>
    	<form action="?action=gestionJeux" method="post">
        <div class="container" style="margin-top: 10px">
            <div class ="row">
                <div class="col-md-3" style="text-align: center">
                	<input type="text" class="form-control" name="nomdujeu" placeholder="Nom du jeu" value="" required/>
                </div>
                
                <div class="col-md-3" style="text-align: center">
                	<input type="text" class="form-control" name="editeurdujeu" placeholder="Editeur du jeu" required />
                </div>
                
                <div class="col-md-2" style="text-align: center">
        			<select name="type_jeu_1" id="inputState" class="form-control">

        			<?php for($index = 0; $index < $nombreDeTypesJeu ; $index++) { ?>

        				<option <?= $index==0?"selected":""; ?> > <?= $typesJeu[$index] ?></option>
        				
        			<?php } ?>
        			
        			</select>
                </div> 
                
                <div class="col-md-2" style="text-align: center">
        			<select name="type_jeu_2" id="inputState" class="form-control">
        			
        			<?php for($index = 0; $index < $nombreDeTypesJeu ; $index++) { ?>

        				<option <?= $index==1?"selected":""; ?> > <?= $typesJeu[$index] ?></option>
        				
        			<?php } ?>
        			
        			</select>
                </div> 
                
                <div class="col-md-2" style="text-align: center">
                	<input type="date" class="form-control" name="date" placeholder="Année d'édition" value="" required/>
                </div> 
                
        </div>
	 
            <div class="row">  <!--Pour afficher les colonnes col-md-6  -->
            
                <div class="col-md-6" style="text-align: center">
                </div>
                
                <div class="col-md-6" style="text-align: center">
                    <div class="row">
                        <div class="col-md-6" style="text-align: center">
                            <input type="text" class="form-control" name="nbrejoueurmin" placeholder="Joueurs min" style="margin-top :20px" required />
                            <input type="text" class="form-control" name="agemin" placeholder="Age min" style="margin-top :20px" required/>  
                            <input type="text" class="form-control" name="dureemin" placeholder="Duree min" style="margin-top :20px" required/>  
                        </div>
                        <div class="col-md-6" style="text-align: center">
							<input type="text" class="form-control" name="nbrejoueurmax" placeholder="Joueurs max" style="margin-top :20px" required />
                            <input type="text" class="form-control" name="agemax" placeholder="Age max" style="margin-top :20px" required/>  
                            <input type="text" class="form-control" name="dureemax" placeholder="Duree max" style="margin-top :20px" required/>  
                        </div>
                    </div>
                         <div class="col-md-12" style="text-align: center">
                            <textarea class="form-control" name="descriptif" rows="3" placeholder="Descriptif" style="margin-top :20px"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-lg btn-success" value="" name="ajouterFicheJeu" style="margin-top :20px">
        				<span class="glyphicon glyphicon-plus-sign"></span> Ajouter la fiche</button>
                    </form>	
                </div>
            </div>
        </div>