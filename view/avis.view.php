<html>

<head>
    <title>La Légende de la Gastronomie</title>
    <link rel="stylesheet" href="../view/assets/css/avis.css" />
    <link rel="icon" type="image/x-icon" href="../view/assets/img/Favicon.ico">
</head>

<?php include('nav.php'); ?>

<body style="background-image: url('../view/assets/img/fond.png');">

    <div class="message"><?= "Laissez votre avis sur notre restaurant !" ?></div>
    <div class="container">
        <form class="form" method="POST" action="<?php echo ($_SESSION['isConnected']) ? '../controller/avis.ctrl.php' : '../controller/connection.ctrl.php'; ?>">
            <input type="number" name="note" id="note" min="0" max="10" placeholder="Entrez une note sur dix" />
            <?= "<br/>" ?>
            <input type="text" name="com" id="com" placeholder="Entrez votre commentaire" />
            <?= "<br/>" ?>
            <input type="submit" value="Envoyer">
        </form>
    </div>
    <?= "<br/>" ?>
    <div class="precedent"><?= "Avis précédents" ?></div>
    <div class="autre">
        <?php
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
    </div>
</body>

</html>