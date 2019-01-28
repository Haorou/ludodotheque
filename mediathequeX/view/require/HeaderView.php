<header>
    <nav class="nav nav-tabs nav-justified">
        <a class="nav-item nav-link <?=$GLOBALS["isActiveMenu"]==TRUE?"active":""; ?>" style="background-color: #dfe3ee;"  >
            <form action="?action=menuPrincipal" method="post">
            	<button type="submit" class="btn <?=$GLOBALS["isActiveMenu"]==TRUE?"btn-primary":"btn-secondary"; ?> btn-block" value="Menu Principal" name="menuPrincipal">Menu Principal</button>
            </form>
    	</a>
    
        <a class="nav-item nav-link <?=$GLOBALS["isActiveAdherent"]==TRUE?"active":""; ?>" style="background-color: #dfe3ee;">
            <form action="?action=gestionAdherents" method="post">
            	<button type="submit" class="btn <?=$GLOBALS["isActiveAdherent"]==TRUE?"btn-primary":"btn-secondary"; ?> btn-block" value="Gestion Adherents" name="gestionAdherents">Gestion Adhérents</button>
            </form>
        </a>
        
        <a class="nav-item nav-link <?=$GLOBALS["isActiveJeu"]==TRUE?"active":""; ?>" style="background-color: #dfe3ee;">
            <form action="?action=gestionJeux" method="post">
            	<button type="submit" class="btn <?=$GLOBALS["isActiveJeu"]==TRUE?"btn-primary":"btn-secondary"; ?> btn-block" value="Gestion Jeux" name="gestionJeux">Gestion Jeux</button>
            </form>
        </a>
        
        <a class="nav-item nav-link <?=$GLOBALS["isActiveAlerte"]==TRUE?"active":""; ?>" style="background-color: #dfe3ee;">
            <form action="?action=gestionAlertes" method="post">
            	<button type="submit" class="btn <?=$GLOBALS["isActiveAlerte"]==TRUE?"btn-primary":"btn-secondary"; ?> btn-block" value="Gestion Alerte" name="gestionAlertes">Gestion Alerte </button>
            </form>
        </a>
        
        <a class="navbar-brand">
            <form action="?action=deconnexion" method="post">
            	<button type="submit" class="btn btn-danger btn-block" value="deconnexion" name="deconnexion">Déconnexion</button>
            </form>
        </a>
    </nav>
</header>