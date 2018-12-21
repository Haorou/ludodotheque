<!DOCTYPE html>
<html>
    <head>
        <title>Mediatheque : Alerte</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    </head>

    <body>
        <nav class="nav nav-tabs nav-justified">      
            <a class="nav-item nav-link" href="#">
    	   		<form action="index.php?action=menuPrincipal" method="post">
    				<button type="submit" class="btn btn-block" value="Menu Principal" name="menuPrincipal">Menu Principal</button>
        		</form>
            </a>
            
            <a class="nav-item nav-link" href="#">
    	   		<form action="index.php?action=gestionAdherents" method="post">
    				<button type="submit" class="btn btn-block" value="Gestion Adherents" name="gestionAdherents">Gestion Adherents</button>
        		</form>
            </a>
            
            <a class="nav-item nav-link" href="#">
    	   		<form action="index.php?action=gestionArticles" method="post">
    				<button type="submit" class="btn btn-block" value="Gestion Articles" name="gestionArticles">Gestion Articles</button>
        		</form>
            </a>
            
            <a class="nav-item nav-link active" href="#">
           		<form action="index.php?action=gestionAlerte" method="post">
            		<button type="submit" class="btn btn-primary btn-block" value="Gestion Alerte" name="gestionAlerte">Gestion Alerte </button>
            	</form>
            </a>
            
            <a class="navbar-brand" href="#">
       			<form action="index.php?action=seDeconnecter" method="post">
            		<button type="submit" class="btn btn-danger btn-block" value="deconnexion" name="deconnexion">Deconnexion</button>
            	</form>
            </a> 
       </nav>
    
		<h1>Bienvenue sur la page Alerte</h1>
		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
    
    </body>
</html>