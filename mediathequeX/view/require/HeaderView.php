<header>
    <nav class="nav nav-tabs nav-justified">
        <a class="nav-item nav-link <?=$GLOBALS["isActiveMenu"]==TRUE?"active":""; ?>" href="#">
            <form action="index.php?action=menuPrincipal" method="post">
            	<button type="submit" class="btn <?=$GLOBALS["isActiveMenu"]==TRUE?"btn-primary":""; ?> btn-block" value="Menu Principal" name="menuPrincipal">Menu Principal</button>
            </form>
    	</a>
    
        <a class="nav-item nav-link <?=$GLOBALS["isActiveAdherent"]==TRUE?"active":""; ?>" href="#">
            <form action="index.php?action=gestionAdherents" method="post">
            	<button type="submit" class="btn <?=$GLOBALS["isActiveAdherent"]==TRUE?"btn-primary":""; ?> btn-block" value="Gestion Adherents" name="gestionAdherents">Gestion Adhérents</button>
            </form>
        </a>
        
        <a class="nav-item nav-link <?=$GLOBALS["isActiveArticle"]==TRUE?"active":""; ?>" href="#">
            <form action="index.php?action=gestionArticles" method="post">
            	<button type="submit" class="btn <?=$GLOBALS["isActiveArticle"]==TRUE?"btn-primary":""; ?> btn-block" value="Gestion Articles" name="gestionArticles">Gestion Articles</button>
            </form>
        </a>
        
        <a class="nav-item nav-link <?=$GLOBALS["isActiveAlerte"]==TRUE?"active":""; ?>" href="#">
            <form action="index.php?action=gestionAlerte" method="post">
            	<button type="submit" class="btn <?=$GLOBALS["isActiveAlerte"]==TRUE?"btn-primary":""; ?> btn-block" value="Gestion Alerte" name="gestionAlerte">Gestion Alerte </button>
            </form>
        </a>
        
        <a class="navbar-brand" href="#">
            <form action="index.php?action=seDeconnecter" method="post">
            	<button type="submit" class="btn btn-danger btn-block" value="deconnexion" name="deconnexion">Déconnexion</button>
            </form>
        </a>
    </nav>
</header>