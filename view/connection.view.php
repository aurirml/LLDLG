<html>

<head>
    <title>La Légende de la Gastronomie</title>
    <link rel="stylesheet" href="../view/assets/css/connexion.css" />
    <script src="../view/assets/js/nomplat.js"></script>
    <link rel="icon" type="image/x-icon" href="../view/assets/img/Favicon.ico">
</head>

<?= include("nav.php")?>

<body style="background-image: url('../view/assets/img/fond.png');">
    <div class="connexion">
        <form action="../controller/connection.ctrl.php" method="POST" class="seconnecter">
            <h1>Connexion</h1>
            <div class="erreur">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            </div>

            <?="<br/>"?>

            <label class="nom"><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="nom" id="nom" required>

            <?= "<br/><br/>" ?>

            <label class="mdp"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="mdp" id="mdp" required>

            <?= "<br/><br/>" ?>

            <input type="submit" value='Envoyer'>
        </form>
    </div>

    <div class="inscription">
        <form method="POST" action="../controller/inscription.ctrl.php" class="sincrire">
            <h2>Pas de compte ?</h2>
            <input type="submit" value="En créer un">
        </form>
    </div>

    <?php include('footer.php');?>
</body>

</html>