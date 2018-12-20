<!DOCTYPE html>
<html>
    <head>
        <title>Mediatheque : Adherent</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>
		<h1>Bienvenue</h1>
		
		<form action="index.php?action=seConnecter" method="post">
            <p>
                Nom d'utilisateur : <br/><input type="text" name="nomUtilisateur" maxlength="50" /><br/>
                Mot de passe : <br/><input type="text" name="motDePasse" maxlength="50" /><br/>
                <input type="submit" value="Se connecter" name="connexion" />
            </p>
        </form>
		
    </body>
</html>