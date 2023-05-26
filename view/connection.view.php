<html>

<head>
    <title>La Légende de la Gastronomie</title>
    <link rel="stylesheet" href="../view/assets/css/Carte.css" />
    <link rel="stylesheet" href="../view/assets/css/navig.css" />
    <link rel="stylesheet" href="../view/assets/css/inscription.css" />
    <script src="../view/assets/js/nomplat.js"></script>
    <link rel="icon" type="image/x-icon" href="../view/assets/img/Favicon.ico">
</head>


<?= include("nav.php")?>

<body style="background-image: url('../view/assets/img/proto3-2.png');background-repeat:no-repeat;">
    <div class="container">
        <form action="../controller/connection.ctrl.php" method="POST" class="connexion">
            <h1>Connexion</h1>
            <div class="erreur">
            <?php
            session_start();
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
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

    <div class="container2">
        <form method="POST" action="../controller/inscription.ctrl.php" class="inscription">
            <h2>Pas de compte ?</h2>
            <input type="submit" value="En créer un">
        </form>
    </div>
</body>

</html>