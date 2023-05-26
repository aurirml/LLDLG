<html>

<head>
    <title>La Légende de la Gastronomie</title>
    <link rel="stylesheet" href="../view/assets/css/Carte.css" />
    <link rel="stylesheet" href="../view/assets/css/navig.css" />
    <script src="../view/assets/js/nomplat.js"></script>
    <link rel="icon" type="image/x-icon" href="../view/assets/img/Favicon.ico">
</head>

<?= include('nav.php');?>

<body background="../view/assets/img/proto3-2.png"> 
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