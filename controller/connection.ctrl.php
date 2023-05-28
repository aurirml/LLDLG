<?php
include("../controller/utils/sessionCheck.ctrl.php");

if (isset($_POST['mdp']) && isset($_POST['nom'])) {
    $nom = $_POST['nom'];
    $mdp = $_POST['mdp'];

    include_once('../model/databaseaccess.model.php');

    $connected = $dao->connection($nom, $mdp);

    if ($connected == true) {
        echo "connection réussite ";

        $_SESSION['username'] = $nom;
        unset($_SESSION['isConnecter']);
        $_SESSION['isConnected'] = true;
        header("Location: ../controller/carte.ctrl.php");
        exit;

    } else {

        $message = "Nom d'utilisateur ou mot de passe incorrect(s)";
        //include('../view/connection.view.php');
    }
} 
include('../view/connection.view.php');
?>