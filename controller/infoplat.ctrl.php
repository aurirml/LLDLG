<?php
require_once("../model/notation.model.php");
require_once("../model/commande.model.php");
include_once("../model/databaseaccess.model.php");
include("../controller/utils/sessionCheck.ctrl.php");

$plat = json_decode(urldecode($_SESSION['currentDish']));

if (isset($_POST['formName'])) {
    $formName = $_POST['formName'];

    if ($formName == "Notation") {

        $notation = new Notation();

        $notation->com = $_POST['com'];
        $notation->note = $_POST['note'];
        $notation->nom_plat = $plat->name_fr;
        $notation->nom = $_SESSION['username'];

        if (is_numeric($notation->note)) {
            $note = intval($notation->note);
            //echo $note;
            if ($note < 0 || $note > 10) {
                $message = "des chiffres entre 0 et 10 pour la note";
            } else {
                $dao->insertNotation($notation);
            }
        } else {
            $message = "des chiffres entre 0 et 10 pour la note stp";
        }
    } else {
        $commande = new Commande();

        $commande->nom_plat = $plat->name_fr;
        $commande->taille = $_POST['size'];
        $commande->quantite = $_POST['quantite'];
        if (is_numeric($commande->quantite)) {
            if ($commande->quantite < 1) {
                $commande->quantite = 1;
            }
        }

        if (!$_SESSION['isConnected']) {
            $found = false;
            foreach ($_SESSION['panierOffLine'] as $orderOffLine) {
                if($orderOffLine->nom_plat == $commande->nom_plat && $orderOffLine->taille == $commande->taille){
                    $found=true;
                    $orderOffLine->quantite += $commande->quantite;
                }
            }
            if(!$found){
                array_push($_SESSION['panierOffLine'], $commande);
            }

        } else {
            $commande->nom_client = $_SESSION['username'];
            $dao->handleOrder($commande);
        }
    }
}
$notations = $dao->getNotations($plat->name_fr);
$moyenne = $dao->calculAverage($plat->name_fr);
include("../view/infoplat.view.php");
