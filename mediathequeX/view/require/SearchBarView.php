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
    
    <div class="row">
        <div class="col-md-8">
          .col-md-8
            <div class="row">
                <div class="col-md-6">.col-md-6</div>
                <div class="col-md-6">.col-md-6</div>
            </div>
        </div>
        <div class="col-md-4">.col-md-4</div>
    </div>