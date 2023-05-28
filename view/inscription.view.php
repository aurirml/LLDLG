<html>

<head>
    <title>La Légende de la Gastronomie</title>
    <link rel="stylesheet" href="../view/assets/css/inscription.css" />
    <script src="../view/assets/js/nomplat.js"></script>
    <link rel="icon" type="image/x-icon" href="../view/assets/img/Favicon.ico">
</head>
<?php include('nav.php')?>

<body style="background-image: url('../view/assets/img/fond.png');">
    <div class="inscription">
        <form action="../controller/inscription.ctrl.php" method="POST" class="sinscrire">
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
if (isset($message)) {
    echo $message;
}
?>

</html>