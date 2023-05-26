<?php
ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);

if (isset($_POST['mdp']) && isset($_POST['nom'])) {
    $nom = $_POST['nom'];
    $mdp = $_POST['mdp'];

    include_once('../model/databaseaccess.model.php');

    $connected = $dao->connection($nom, $mdp);

    if ($connected == true) {
        echo "connection réussite ";
        session_start();
        $_SESSION['con'] = $nom;
        header("Location: ../view/Carte.php");
        exit;

    } else {
        session_start();
        $_SESSION['message'] = "Nom d'utilisateur ou mot de passe incorrect(s)";
        //include('../view/connection.view.php');
    }
} 
include('../view/connection.view.php');
?>