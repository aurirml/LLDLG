<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $mdp = $_POST['mdp'];

include_once('databaseaccess.model.php');

$connected = $dao->connection($nom, $mdp);

if($connected == false){
    session_start();
    $_SESSION['message'] = "Nom d'utilisateur ou mot de passe incorrect(s)";
    header("Location: http://localhost/ProjetWD/connection.php");
    exit;
}else{
    echo "connection réussite ";
    session_start();
    $_SESSION['con'] = $nom;
    header("Location: http://localhost/ProjetWD/Carte.php");
}
}
?>