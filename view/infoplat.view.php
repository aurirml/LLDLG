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

    <div class="moyenne">
        <?= "Note moyenne de $moyenne / 10"; ?>
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
        } else {
            array_push($imageLinks, "../view/assets/img/imagedispo.png");
        }
    }

    ?>
    <div class="carrousel">
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <div class="slideshow-container">

            <?php
            foreach ($imageLinks as $img) {
            ?>
                <div class="mySlides fade">
                    <img src="<?= $img; ?>">
                </div>
            <?php
            }
            ?>
        </div>
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

    $i = count($plat->prices);

    ?>
    <div class="taille">
        <?php
        foreach ($plat->prices as $prix) {
            $tarif = $prix->price;
            $taille = $prix->size;

            if ($i > 1) {
                echo "<b>Taille </b>: $taille" ?><span style="float:right"><?= "<b>Prix</b>: $tarif € <br/>" ?> </span><?php
                                                                                                                        } else {
                                                                                                                            ?>
                <div class="prix"> <?= "<b>Prix :</b> $tarif €"; ?></div>
            <?php
                                                                                                                        }
            ?>

            <div class="ajouter">
                <form method="POST" class="connexion" action="../controller/infoplat.ctrl.php">
                    <input type="hidden" name="formName" value="Panier" />
                    <input type="hidden" name="size" value="<?= $taille ?>" />
                    <input type="number" value="1" min="1" name="quantite" id="quantite2" placeholder="Quantité" />

                    <input type="submit" class="ajout" name="bouton1" value='Ajouter au panier'>
                </form>
            </div>
        <?php
        }
        ?>
    </div>

    <?php if($_SESSION['isConnected']){
    ?>

    <div class="laisseravis"> Laissez votre avis sur notre <?= "$plat->name_fr" ?> !</div>
    <div class="container">
        <form class="form" method="POST" action="<?php echo ($_SESSION['isConnected']) ? '../controller/avis.ctrl.php' : '../controller/connection.ctrl.php'; ?>">
            <input type="number" name="note" id="note" min="0" max="10" placeholder="Entrez une note sur dix" />
            <br/>
            <input type="text" name="com" id="com" placeholder="Entrez votre commentaire" />
            <br/>
            <input type="submit" name="bouton2" value="Envoyer">
        </form>
    </div>
    <br/>
    <?php
    }
    else{
        ?>
        <div class="connexion"> <a href="../controller/connexion.ctrl.php" class="link">Connectez-vous</a> pour laisser votre avis sur notre <?= "$plat->name_fr" ?>  !</div>
        <?php
    }

    ?>

    <div class="notation">
        <button type="button" class="collapsible">Avis précédent</button>
        <div class="content">
            <p>
            <div class="grille">
                <?php
                foreach ($notations as $avis) {
                ?>
                    <div class="autre">

                        <figure>
                            <figcaption>— <?= $avis->nom ?>, <cite>Note de : <?= $avis->note ?> / 10.</cite><br /> Commentaire : </figcaption>
                            <blockquote>
                                <p><?= $avis->com ?></p>
                            </blockquote>

                        </figure>
                    </div>
                <?php } ?>
            </div>
            </p>
        </div>
    </div>
    <?php include('footer.php'); ?>

</body>

<?php
if (isset($message)) {
    echo $message;
}
?>

</html>