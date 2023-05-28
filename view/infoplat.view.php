<html>

<head>
    <title>La Légende de la Gastronomie</title>
    <link rel="stylesheet" href="../view/assets/css/infoplat.css" />
    <script src="../view/assets/js/nomplat.js"></script>
    <link rel="icon" type="image/x-icon" href="../view/assets/img/Favicon.ico">
</head>

<?php include 'nav.php'; ?>

<body style="background-image: url('../view/assets/img/fond.png');" onload="currentSlide(1); initToggle();">

    <div class="plat">
        <?php echo $plat->name_fr; ?>
    </div>

    <?php

    $imageLinks = array();
    foreach ($plat->images as $img) {
        if ($img != NULL) {
            if (getimagesize($img)) {
                array_push($imageLinks, $img);
            } else {
                array_push($imageLinks, "../view/assets/img/error.png");
            }
        }
    }

    ?>
    <div class="carrousel">
        <div class="slideshow-container">

            <?php
            foreach ($imageLinks as $img) {
            ?>
                <div class="mySlides fade">
                    <img src="<?= $img; ?>" style="width:100%">
                </div>
            <?php
            }
            ?>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>


    <div style="text-align:center">
        <?php

        for ($i = 1; $i <= count($imageLinks); $i++) {
        ?>

            <span class="dot" onclick="currentSlide(<?= $i; ?>)"></span>
        <?php
        }
        ?>
    </div>



    <div class="ingredients">
        <?php
        echo "<b>Ingrédients :</b> ";
        foreach ($plat->ingredients as $ing) {
            echo " ~ " . $ing->name_fr;
        }

        ?>
    </div>

    <?php

    $i = 0;

    foreach ($plat->prices as $prix) {
        $i++;
    }
    if ($i == 1) {
        $tarif = $prix->price;

    ?>
        <div class="prix"> <?= "<b>Prix :</b> $tarif €"; ?></div>
        <div class="panier">
            <form method="POST" class="connexion" action="../controller/infoplat.ctrl.php">
                <input type="hidden" name="formName" value="Panier" />
                <input type="submit" class="ajout1" name="bouton1" value='Ajouter au panier'>
            </form>
        </div>
    <?php
    } elseif ($i >= 1) {
    ?>
        <div class="taille">
            <?php
            foreach ($plat->prices as $prix) {
                $tarif = $prix->price;
                $taille = $prix->size;

            ?>

                <?php echo "<b>Taille </b>: $taille" ?><span style="float:right"><?= "<b>Prix</b>: $tarif € <br/>"; ?></span>
                <div class="ajouter">
                    <form method="POST" class="connexion" action="../controller/infoplat.ctrl.php">
                        <input type="hidden" name="formName" value="Panier" />
                        <input type="hidden" name="size" value="<?= $taille ?>" />
                        <input type="submit" class="ajout2" name="bouton1" value='Ajouter au panier'>
                    </form>
                </div>
            <?php
            }
            ?>
        </div><?php
            }
                ?>

    <form class="form" method="POST" action="<?php echo ($_SESSION['isConnected']) ? "../controller/infoplat.ctrl.php" : '../controller/connection.ctrl.php'; ?>">
        <input type="number" name="note" id="note" min="0" max="10" placeholder="entrez une note sur dix" />
        <input type="hidden" name="formName" value="Notation" />
        <input type="text" name="com" id="com" placeholder="entrez votre commentaire" />
        <input type="submit" name="bouton2" value="Envoyer">

    </form>
    <div class="avis">
        <?= "<b>Les avis sur notre $plat->name_fr</b>"; ?>
    </div>

    <div class="moyenne">
        <?= "Note moyenne de $moyenne / 10"; ?>
    </div>

    <div class="notation">
        <button type="button" class="collapsible">Open Collapsible</button>
        <div class="content">
            <p>        <?php
        foreach ($notations as $avis) {
        ?>
            <figure>
                <figcaption>— <?= $avis->nom ?>, <cite>Note de : <?= $avis->note ?> / 10.</cite> Commentaire : </figcaption>
                <blockquote>
                    <p><?= $avis->com ?></p>
                </blockquote>

            </figure>
        <?php
        }
        ?>
        </p>
        </div>
    </div>



    <div class="author">
        <?php echo "<br/>" ?>
        <?php echo 'By : Allan Chopra & Auriane Ramel'; ?>
    </div>


</body>

<?php
if (isset($message)) {
    echo $message;
}
?>

</html>