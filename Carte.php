<html>

<head>
    <title>La Légende de la Gastronomie</title>
    <link rel="stylesheet" href="assets/css/Carte.css" />
    <link rel="stylesheet" href="assets/css/navig.css" />
    <script src="assets/js/nomplat.js"></script>
    <link rel="icon" type="image/x-icon" href="assets/img/Favicon.ico">
</head>


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


<body background="./assets/img/proto3-2.png">
    <?php
    $url = "http://test.api.catering.bluecodegames.com/menu";

    $postdata = json_encode(
        array(
            'id_shop' => 1
        )
    );

    $opts = array(
        'http' => array(
            'method' => "POST",
            'header' => "Content-Type:application/json",
            'content' => $postdata
        )
    );

    $context = stream_context_create($opts);

    // Accès à un fichier HTTP avec les entêtes HTTP indiqués ci-dessus
    $file = file_get_contents($url, false, $context);
    $json = json_decode($file);
    ?>

    <div class="affichageplat">
        <?php
        echo "<br/>";
        foreach ($json->data as $type) {
            $types = $type->name_fr;
        ?>

            <div class="typeplat">
                <?php echo $types; ?>
            </div>

            <?php
            foreach ($type->items as $plat) {
                $nom = $plat->name_fr;
                $items = urlencode(json_encode($plat));
            ?>

                <div class="nomplat">
                    <?php echo $nom; ?>
                    <a href='infoplat.php?nom=<?= $items; ?>'> <img src="assets/img/info.png"> </a>
                </div>

        <?php
            }
            echo "<br/>";
        }
        ?>
        <div class="espace"><?= "<br/>"; ?></div>
    </div>


    <div class="author">
        <?php echo 'By : Allan Chopra & Auriane Ramel'; ?>
    </div>

    <?php echo '<br/>'; ?>

</body>

</html>