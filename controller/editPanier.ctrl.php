<?php
require_once("../model/databaseaccess.model.php");
include_once("../model/commande.model.php");
include("../controller/utils/sessionCheck.ctrl.php");


if(isset($_POST['quantite']) && isset($_POST['taille']) && isset($_POST['nom'])){
    var_dump($_POST);
    $nom = urldecode($_POST['nom']);
    $quantite = urldecode($_POST['quantite']);
    $taille = urldecode($_POST['taille']);
    if(!$_SESSION['isConnected']){
        for($i = 0; $i < count($_SESSION['panierOffLine']); $i++ ){
            $commande = $_SESSION['panierOffLine'][$i];
            if($commande->nom_plat == $nom && $commande->taille == $taille){
                $commande->quantite += $quantite;
                if($commande->quantite <= 0){
                    unset($_SESSION['panierOffLine'][$i]);
                }
                break;
            }
        }
    }
    else{
        $commande = new Commande();

        $commande->nom_plat = $nom;
        $commande->nom_client = $_SESSION['username'];
        $commande->taille = $taille;
        $commande->quantite = $quantite;

        $dao->handleOrder($commande);
    }
}
?>