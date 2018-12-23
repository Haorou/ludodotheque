<!DOCTYPE html>
<html>  
    <head>
        <title>Mediatheque : Connexion</title>
        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
        
    </head>

    <body>
		<h1>Bienvenue utilisateur</h1>
		
		<form action="index.php?action=seConnecter" method="post">
            <p>
                Nom d'utilisateur : <br/><input type="text" name="nomUtilisateur" maxlength="50" /><br/>
                Mot de passe : <br/><input type="text" name="motDePasse" maxlength="50" /><br/>
                <input type="submit" value="connexion" name="connexion" />
            </p>
        </form>
		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
    
    </body>
</html>