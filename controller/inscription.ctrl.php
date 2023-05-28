<?php
if (isset($_POST['mdp']) && isset($_POST['nom']) && isset($_POST['email'])){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
        
    include_once('../model/databaseaccess.model.php');

    $result = $dao->inscription($nom, $email, $mdp);
    
    if($result['status']==true){
        $message = "inscription réussie !";
        header("Location: ../controller/connection.ctrl.php");
        exit;
    }
    else{

        $message = $result['message'];
    }
}
    include('../view/inscription.view.php');
