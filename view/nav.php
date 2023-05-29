<head>
    <link rel="stylesheet" href="../view/assets/css/navig.css" />
    <link rel="stylesheet" href="../view/assets/css/gif.css" />
</head>
<?php include("../controller/utils/sessionCheck.ctrl.php"); ?>

<div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navig">
    <div class="container-4 w-container">
        <nav role="navigation" class="nav-menu-2 w-nav-menu">
            <div class="nav-link-container">
                <a href="../controller/carte.ctrl.php" class="nav-link w-nav-link">La Carte</a>
            </div>
            <div class="nav-link-container">
                <a href="../controller/avis.ctrl.php" class="nav-link w-nav-link">Avis</a>
            </div>
            <a href="../controller/accueil.ctrl.php" aria-current="page" class="brand-3 w-nav-brand w--current">
                <div class="rotation-container">
                    <img src="../view/assets/img/gif1.png" class="rotating-image">
                    <img src="../view/assets/img/gif2.png" class="rotating-image" onmouseover="playAudio()" onmouseout="pauseAudio()">
                </div>
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
<audio id="audio" class="audio" src="../view/assets/audio/Fond.mp3"></audio>
<script src="../view/assets/js/logogif.js"></script> 