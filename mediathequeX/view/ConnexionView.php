<!DOCTYPE html>
<html>  
    <head>
        <title>Médiathèque : Connexion</title>
 		<?php require("view/require/HeadReferenceView.php");?>
    </head>

    <body>
    
    <body id="LoginForm">
        <div class="container">
        <h1 class="form-heading">Formulaire de connexion</h1>
        <div class="login-form">
        <div class="main-div">
            <div class="panel">
           <p>Entrez votre nom d'utilisateur et votre mot de passe</p>
           </div>
            <form id="Login" action="index.php?action=menuPrincipal" method="post">
        
                <div class="form-group">
                    <input type="text" name="nomUtilisateur" class="form-control" id="inputEmail" placeholder="Nom d'utilisateur">
                </div>
        
                <div class="form-group">
                    <input type="password"  name="motDePasse" class="form-control" id="inputPassword" placeholder="Mot de passe">
                </div>
                        
                <div class="forgot">
                	<a href="reset.html">Recupérer son mot de passe</a>
                </div>
                <button type="submit" class="btn btn-primary" value="connexion" name="connexion">Se connecter</button>
        
            </form>
            </div></div></div>
		
			<?php require("view/require/FooterView.php");?>
		
    </body>
</html>