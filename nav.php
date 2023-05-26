<div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="clark-house-nav navbar-3 w-nav">
    <div class="container-4 w-container">
        <nav role="navigation" class="nav-menu-2 w-nav-menu">
            <div class="nav-link-container">
                <a href="Carte.php" class="nav-link w-nav-link">La Carte</a>
            </div>
            <div class="nav-link-container">
                <a href="avis.php" class="nav-link w-nav-link">Avis</a>
            </div>
            <a href="index.php" aria-current="page" class="brand-3 w-nav-brand w--current">
                <img src="assets/img/Favicon.png" class="ch-logo" width="10%" />
            </a>
            <div class="nav-link-container">
                <a href="panier.php" class="nav-link w-nav-link">Panier</a>
            </div>
            <div class="nav-link-container">
                <?php
                session_start();
                if (isset($_SESSION['con'])) {
                    $nom = $_SESSION['con'];
                ?><a href="deconnection.php" class="nav-link w-nav-link">Déconnexion</a><?php
                                                                                    } else {
                                                                                        ?><a href="connection.php" class="nav-link w-nav-link">Se Connecter</a><?php
                                                                                                                                                            }
                                                                                                                                                                ?>

            </div>
        </nav>
        <div data-w-id="efe43ab4-7fb3-6061-73db-9aebea56c600" class="menu-button w-nav-button">
            <div data-is-ix2-target="1" class="lottie-animation-2" data-w-id="efe43ab4-7fb3-6061-73db-9aebea56c601" data-animation-type="lottie" data-src="https://uploads-ssl.webflow.com/5ede4abe5c3228fa6142cd0a/5ede4abe5c32281f2b42cd13_lottieflow-menu-nav-08-000000-easey.json" data-loop="0" data-direction="1" data-autoplay="0" data-renderer="svg" data-default-duration="2.0208333333333335" data-duration="0" data-ix2-initial-state="0"></div>
        </div>
        <div class="nav-bg"></div>
    </div>
</div>