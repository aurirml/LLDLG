<?php
if (isset($_POST['mdp']) && isset($_POST['nom']) && isset($_POST['email'])){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
/*
    if($mdp==''){
        session_start();
        $_SESSION['message'] = "il faut un mot de passe.";
        $conn->close();
        header("Location: ../controller/inscription.ctrl.php");
        exit;
    }*/
    
    include_once('../model/databaseaccess.model.php');

    $result = $dao->inscription($nom, $email, $mdp);
    session_start();
    
    if($result['status']==true){
        $_SESSION['message'] = "inscription réussie !";
        header("Location: ../controller/connection.ctrl.php");
        exit;
    }
    else{

        $_SESSION['message'] = $result['message'];
    }
}
    include('../view/inscription.view.php');
