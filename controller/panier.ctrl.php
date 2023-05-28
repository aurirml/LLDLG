<?php
include_once("../model/databaseaccess.model.php");
include("../controller/utils/sessionCheck.ctrl.php");

ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);

$orders = [];

if(count($_SESSION['panierOffLine']) > 0){
    $orders = $_SESSION['panierOffLine'];
}
if($_SESSION['isConnected']){
    $user = $_SESSION['username'];
    foreach($orders as $commande){
        $commande->nom_client = $user;
        $dao->insertOrder($commande);
    }
    $_SESSION['panierOffLine'] = [];
    $orders = $dao->getOrders($user);
}

include("../view/panier.view.php");
?>