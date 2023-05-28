<head>
    <link rel="stylesheet" href="../view/assets/css/navig.css" />
</head>
<?php include("../controller/utils/sessionCheck.ctrl.php");?>

<div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="clark-house-nav navbar-3 w-nav">
    <div class="container-4 w-container">
        <nav role="navigation" class="nav-menu-2 w-nav-menu">
            <div class="nav-link-container">
                <a href="../controller/carte.ctrl.php" class="nav-link w-nav-link">La Carte</a>
            </div>
            <div class="nav-link-container">
                <a href="../controller/avis.ctrl.php" class="nav-link w-nav-link">Avis</a>
            </div>
            <a href="../controller/accueil.ctrl.php" aria-current="page" class="brand-3 w-nav-brand w--current">
                <img src="../view/assets/img/Favicon.png" class="ch-logo" width="10%" />
            </a>
            <div class="nav-link-container">
                <a href="../controller/panier.ctrl.php" class="nav-link w-nav-link">Panier</a>
            </div>
            <div class="nav-link-container">
                <?php
                if ($_SESSION['isConnected']) {
                ?><a href="../controller/deconnection.ctrl.php" class="nav-link w-nav-link">Déconnexion</a><?php
                                                                                            } else {
                                                                                                ?><a href="../controller/connection.ctrl.php" class="nav-link w-nav-link">Se Connecter</a><?php
                                                                                                                                                                                        }
                                                                                                                                                                                            ?>

            </div>
        </nav>
    </div>
</div>