<html>

<head>
    <title>La Légende de la Gastronomie</title>
    <link rel="stylesheet" href="../view/assets/css/Carte.css" />
    <script src="../view/assets/js/currentDish.js"></script>   
    <link rel="icon" type="image/x-icon" href="../view/assets/img/Favicon.ico">
</head>

<?= include('nav.php');?>

<body background="../view/assets/img/fond.png" onload="plat()";> 

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
                    <a class="linkDetails" data-info-dish=<?= $items ?>> <img src="../view/assets/img/info.png"> </a>
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