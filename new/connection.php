<!DOCTYPE html>
<html>
<head>
    <title>Récupération des variables d'entrée</title>
</head>
<body>
    <form method="POST" action="connectionaff.php">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">

        <label for="mdp">mdp :</label>
        <input type="password" name="mdp" id="mdp">

        <input type="submit" value="Envoyer">
    </form>
    <form method="POST" action="inscription.php">>
        <input type="submit" value="crée un compte">
    </form>
</body>
<?php
session_start();
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
</html>