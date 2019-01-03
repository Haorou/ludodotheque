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
    
    <div class="container">
        <div class="row">
            <div class="col-md-10">
            
            <!-- IL FAUT PEUPLER CECI EN FONCTION D'UNE REQUETE INITAL GENERAL "SELECT * FROM ... " -->
	        <!-- PUIS PRECISER LA REQUETE EN FONCTION DES MOTS TAPPER DANS LE CHAMPS DE RECHERCE "SELECT * FROM ... WHERE = "champs de recherche" " -->
	        <!-- POUR ACTUALISER : UTILISATION JAVASCRIPT -->
        		<form>
        			<select class="custom-select" size="3">
                      <option selected="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
				</form>
    			
                <div class="row">
                    <div class="col-md-6">.col-md-6</div>
                    <div class="col-md-6">.col-md-6</div>
                </div>
                
            </div>
            
            <div class="col-md-2">.col-md-3</div>
        </div>
    </div>