<html>

<head>
    <title>La Légende de la Gastronomie</title>
    <link rel="stylesheet" href="../view/assets/css/Carte.css" />
    <link rel="stylesheet" href="../view/assets/css/navig.css" />
    <link rel="stylesheet" href="../view/assets/css/inscription.css" />
    <script src="../view/assets/js/nomplat.js"></script>
    <link rel="icon" type="image/x-icon" href="../view/assets/img/Favicon.ico">
</head>
<?php include('nav.php')?>

<body style="background-image: url('../view/assets/img/proto3-2.png');background-repeat:no-repeat;">
    <div class="container">
        <form action="../controller/inscription.ctrl.php" method="POST" class="connexion">
            <h1>Inscription</h1>

            <?= "<br/>" ?>

            <label class="nom"><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer votre nom d'utilisateur" name="nom" id="nom" required>

            <?= "<br/><br/>" ?>

            <label class="email"><b>Adresse email</b></label>
            <input type="email" placeholder="Entre votre adresse mail" name="email" id="email" required>

            <?= "<br/><br/>" ?>

            <label class="mdp"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer votre mot de passe" name="mdp" id="mdp" required>

            <?= "<br/><br/>" ?>

            <input type="submit" value='Créer mon compte'>
        </form>
    </div>
</body>
<?php
session_start();
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

</html>