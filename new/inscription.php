<!DOCTYPE html>
<html>
<head>
    <title>Récupération des variables d'entrée</title>
</head>
<body>
    <form method="POST" action="inscriptionaff2.php">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">

        <label for="email">Email :</label>
        <input type="email" name="email" id="email">

        <label for="mdp">mdp :</label>
        <input type="password" name="mdp" id="mdp">

        <input type="submit" value="Envoyer">
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