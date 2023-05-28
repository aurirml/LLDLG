<?php
require_once("../model/notation.model.php");
include_once("../model/databaseaccess.model.php");
include("../controller/utils/sessionCheck.ctrl.php");

$resto = 'RESTO';

if(isset($_POST['note']) && isset($_POST['com'])){
    $notation = new Notation();

    $notation->com = $_POST['com'];
    $notation->note = $_POST['note'];
    $notation->nom_plat = $resto;
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
}
$notations = $dao->getNotations($resto);
include("../view/avis.view.php");
?>