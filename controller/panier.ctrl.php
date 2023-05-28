<?php
include_once("../model/databaseaccess.model.php");
include_once("../model/commande.model.php");
include("../controller/utils/sessionCheck.ctrl.php");
include_once("../model/apiaccess.model.php");

$json = $apiclient->getAllPlat();
$orders = [];

if(count($_SESSION['panierOffLine']) > 0){
    $orders = $_SESSION['panierOffLine'];
}
if($_SESSION['isConnected']){
    $user = $_SESSION['username'];
    foreach($orders as $commande){
        $commande->nom_client = $user;
        $dao->handleOrder($commande);
    }
    $_SESSION['panierOffLine'] = [];
    $orders = $dao->getPanier($user);
}
if($_SESSION['isConnected'] && $_POST['payer']){
    $user = $_SESSION['username'];
    $orders = $dao->deletePanier($user);
    $mesage = "Merci pour votre commande !";
}

include("../view/panier.view.php");
