		<h1 class="form-heading" style="text-align: center">Modifier fiche jeu</h1>
    	<form action="index.php" method="post">
        <div class="container" style="margin-top: 10px">
            <div class ="row">
                <div class="col-md-3" style="text-align: center">
                	<input type="text" class="form-control" name="nomdujeu" placeholder="Nom du jeu" value="<?= "{$ficheJeu->titre()}"?>" required/>
                </div>
                
                <div class="col-md-3" style="text-align: center">
                	<input type="text" class="form-control" name="editeurdujeu" placeholder="Editeur du jeu" value=<?= "{$ficheJeu->editeur()}"?> required />
                </div>
                
                <div class="col-md-2" style="text-align: center">
        			<select name="type_jeu_1" id="inputState" class="form-control">
         				<option <?= $ficheJeu->types_de_jeu()[0]=='familial'?"selected":"";?> > familial </option>
        				<option <?= $ficheJeu->types_de_jeu()[0]=='handicap'?"selected":"";?> > handicap </option>
        				<option <?= $ficheJeu->types_de_jeu()[0]=='hasard'?"selected":"";?> > hasard </option>
        				<option <?= $ficheJeu->types_de_jeu()[0]=='jeu de rôle'?"selected":"";?> > jeu de rôle </option>
        				<option <?= $ficheJeu->types_de_jeu()[0]=='stratégie'?"selected":"";?> > stratégie </option>
        			</select>
                </div> 
                
                <div class="col-md-2" style="text-align: center">
        			<select name="type_jeu_2" id="inputState" class="form-control">
        				<option <?= $ficheJeu->types_de_jeu()[1]=='familial'?"selected":"";?> > familial </option>
        				<option <?= $ficheJeu->types_de_jeu()[1]=='handicap'?"selected":"";?> > handicap </option>
        				<option <?= $ficheJeu->types_de_jeu()[1]=='hasard'?"selected":"";?> > hasard </option>
        				<option <?= $ficheJeu->types_de_jeu()[1]=='jeu de rôle'?"selected":"";?> > jeu de rôle </option>
        				<option <?= $ficheJeu->types_de_jeu()[1]=='stratégie'?"selected":"";?> > stratégie </option>
        			</select>
                </div> 
                
                <div class="col-md-2" style="text-align: center">
                	<input type="date" class="form-control" name="date" placeholder="Année d'édition" value=<?= "{$ficheJeu->date_de_publication()}"?> required/>
                </div> 
                
        </div>
	 
            <div class="row">  <!--Pour afficher les colonnes col-md-6  -->
            
                <div class="col-md-6" style="text-align: center">
                </div>
                
                <div class="col-md-6" style="text-align: center">
                    <div class="row">
                        <div class="col-md-6" style="text-align: center">
                            <input type="text" class="form-control" name="nbrejoueurmin" placeholder="Joueurs min" style="margin-top :20px" value=<?= "{$ficheJeu->nombre_de_joueurs_min()}"?> required />
                            <input type="text" class="form-control" name="agemin" placeholder="Age min" style="margin-top :20px"value=<?= "{$ficheJeu->age_min()}"?> required/>  
                            <input type="text" class="form-control" name="dureemin" placeholder="Duree min" style="margin-top :20px" value=<?= "{$ficheJeu->duree_min_de_jeu()}"?> required/>  
                        </div>
                        <div class="col-md-6" style="text-align: center">
							<input type="text" class="form-control" name="nbrejoueurmax" placeholder="Joueurs max" style="margin-top :20px" value=<?= "{$ficheJeu->nombre_de_joueurs_max()}"?> required />
                            <input type="text" class="form-control" name="agemax" placeholder="Age max" style="margin-top :20px" value=<?= "{$ficheJeu->age_max()}"?> required/>  
                            <input type="text" class="form-control" name="dureemax" placeholder="Duree max" style="margin-top :20px" value=<?= "{$ficheJeu->duree_max_de_jeu()}"?> required/>  
                        </div>
                    </div>
                         <div class="col-md-12" style="text-align: center">
                            <textarea class="form-control" name="descriptif" rows="3" placeholder="Descriptif" style="margin-top :20px" value=<?= "{$ficheJeu->descriptif()}"?>></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-lg btn-warning" value="" name="UpdateFicheJeu" style="margin-top :20px">
        				<span class="glyphicon glyphicon-plus-sign"></span> Modifier la fiche</button>
                    </form>	
                </div>
            </div>
        </div>